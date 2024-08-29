<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailsSent extends Model
{
    use HasFactory;

    protected $table = 'emails_sent';

    protected $fillable = ['campaign_id', 'email_list_id', 'sent_at'];

    public function campaign()
    {
        return $this->belongsTo(EmailSentCampaign::class, 'campaign_id');
    }

    public function emailList()
    {
        return $this->belongsTo(EmailList::class, 'email_list_id');
    }
}
