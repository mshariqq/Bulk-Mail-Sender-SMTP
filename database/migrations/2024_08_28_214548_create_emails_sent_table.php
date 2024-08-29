<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsSentTable extends Migration
{
    public function up()
    {
        Schema::create('emails_sent', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campaign_id');
            $table->unsignedBigInteger('email_list_id');
            $table->timestamp('sent_at');
            $table->timestamps();

            $table->foreign('campaign_id')->references('id')->on('email_sent_campaigns')->onDelete('cascade');
            $table->foreign('email_list_id')->references('id')->on('email_list')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('emails_sent');
    }
}
