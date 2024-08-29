<?php

namespace App\Http\Controllers;

use App\Models\EmailSentCampaign as EmailCampaign;
use App\Models\EmailList;
use App\Models\EmailsSent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailCampaignController extends Controller
{

    public function index()
    {
        // Paginate campaigns with 25 per page
        $campaigns = EmailCampaign::latest()->paginate(25);
    
        foreach ($campaigns as $campaign) {
            // Get total emails for the list_name
            $totalEmails = EmailList::where('list_name', $campaign->list_name)->count();
    
            // Get the count of emails sent for the campaign from the email_sent table
            $sentEmails = EmailsSent::where('campaign_id', $campaign->id)->count();
    
            // Calculate remaining emails
            $remainingEmails = max(0, $totalEmails - $sentEmails);
    
            // Store email status
            $campaign->emails_status = "{$sentEmails}/{$totalEmails}";
        }
    
        return view('email_campaign.index', compact('campaigns'));
    }
    

    public function create()
    {
        $emailLists = EmailList::all(); // Get all email addresses for selection
        return view('email_campaign.create', compact('emailLists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'list_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'attachment' => 'nullable|file',
        ]);
    
        $campaign = EmailCampaign::create([
            'name' => $request->name,
            'list_name' => $request->list_name,
            'subject' => $request->subject,
            'body' => $request->body,
            'attachment' => $request->file('attachment') ? $request->file('attachment')->store('attachments') : null,
            'emails_per_hour' => $request->emails_per_hour,
        ]);
    
        return redirect()->route('email_campaign.index')->with('success', 'Campaign created successfully.');
    }
    
    
    public function start(Request $request)
    {
        // return response()->json(['success' => 'Email sent successfully.']);

        // die('hello');
        $request->validate([
            'campaign_id' => 'required|exists:email_sent_campaigns,id',
        ]);
    
        $campaign = EmailCampaign::findOrFail($request->campaign_id);
    
        // Get the last sent email ID from the campaign
        $lastSentEmailId = $campaign->last_sent_email_id ?? 0;
    
        // Get the next email to send
        $email = EmailList::where('list_name', $campaign->list_name)
                          ->where('id', '>', $lastSentEmailId)
                          ->first();
    
        if (!$email) {
            return response()->json(['error' => 'No new emails to send.']);
        }
    
        // Update the last sent email ID
        $campaign->last_sent_email_id = $email->id;
        $campaign->save();
    
        // Get attachment details if any
        $attachmentPath = $campaign->attachment; // Assuming this field exists in EmailCampaign
    
        // Send email with or without attachment
        // Send email
        $body = (string) $campaign->body; // Ensure body is a string
        // Mail::raw($body, function($message) use ($email, $campaign) {
        //     $message->to($email->email)
        //             ->subject($campaign->subject);
        //     // If there's an attachment, add it
        //     if ($campaign->attachment_path) {
        //         $message->attach(storage_path('app/' . $campaign->attachment_path));
        //     }
        // });
    
        // // Insert record into email_sent table
        // EmailsSent::create([
        //     'campaign_id' => $campaign->id,
        //     'email_list_id' => $email->id,
        //     'sent_at' => now(),
        // ]);

        dd(storage_path('app/' . $campaign->attachment));


        try {
            Mail::raw($body, function($message) use ($email, $campaign) {
                $message->to($email->email)
                        ->subject($campaign->subject);
                if ($campaign->attachment && file_exists(storage_path('app/' . $campaign->attachment))) {
                    $message->attach(storage_path('app/' . $campaign->attachment));
                }
            });
        
            EmailsSent::create([
                'campaign_id' => $campaign->id,
                'email_list_id' => $email->id,
                'sent_at' => now(),
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to send email: ' . $e->getMessage()]);
        }
    
        return response()->json(['success' => 'Email sent successfully.']);
    }
    
    
    
}
