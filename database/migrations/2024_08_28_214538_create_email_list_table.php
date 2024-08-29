<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailListTable extends Migration
{
    public function up()
    {
        Schema::create('email_list', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('company_name')->nullable();
            $table->string('person_name')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_list');
    }
}
