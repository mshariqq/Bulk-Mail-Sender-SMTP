<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailsSent;
use App\Models\EmailSentCampaign;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total number of emails sent
        $totalEmailsSent = EmailsSent::count();

        // Get the total number of emails sent today
        $totalEmailsSentToday = EmailsSent::whereDate('sent_at', Carbon::today())->count();

        // Get the total number of emails sent this week
        $totalEmailsSentThisWeek = EmailsSent::whereBetween('sent_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        // Get the total number of emails sent this month
        $totalEmailsSentThisMonth = EmailsSent::whereMonth('sent_at', Carbon::now()->month)->count();

        // Get the total number of emails sent this year
        $totalEmailsSentThisYear = EmailsSent::whereYear('sent_at', Carbon::now()->year)->count();

        // Get the latest 5 campaigns
        $latestCampaigns = EmailSentCampaign::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalEmailsSent',
            'totalEmailsSentToday',
            'totalEmailsSentThisWeek',
            'totalEmailsSentThisMonth',
            'totalEmailsSentThisYear',
            'latestCampaigns'
        ));
    }
}
