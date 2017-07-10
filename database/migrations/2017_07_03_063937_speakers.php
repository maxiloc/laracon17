<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Speakers extends Migration
{
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('conferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('year');
            $table->string('location');
            $table->timestamps();
        });

        Schema::create('conference_speaker', function (Blueprint $table) {
            $table->integer('conference_id');
            $table->integer('speaker_id');
        });
    }

    public function down()
    {
        Schema::drop('speakers');
        Schema::drop('conferences');
        Schema::drop('conference_speaker');
    }
}
