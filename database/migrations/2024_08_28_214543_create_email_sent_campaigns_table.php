<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSentCampaignsTable extends Migration
{
    public function up()
    {
        Schema::create('email_sent_campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('emails_to_send');
            $table->unsignedBigInteger('last_sent_email_id')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->string('attachment')->nullable();
            $table->timestamps();
            
            // Add foreign key constraints in the `emails_sent` migration
            // $table->foreign('last_sent_email_id')->references('id')->on('emails_sent')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_sent_campaigns');
    }
}
