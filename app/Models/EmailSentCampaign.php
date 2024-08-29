<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailSentCampaign extends Model
{
    use HasFactory;

    protected $table = 'email_sent_campaigns';

    protected $fillable = ['name', 'list_name', 'last_sent_email_id', 'subject', 'body', 'attachment', 'emails_per_hour'];

    public function lastSentEmail()
    {
        return $this->belongsTo(EmailsSent::class, 'last_sent_email_id');
    }
}
