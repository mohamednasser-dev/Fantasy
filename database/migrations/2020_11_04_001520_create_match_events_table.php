<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_events', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('player_id')->unsigned()->nullable();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

            // $table->bigInteger('match_id')->unsigned()->nullable();
            // $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');

            $table->bigInteger('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_events');
    }
}
