<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_targets', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');


            $table->bigInteger('club_id')->unsigned()->nullable();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            

            $table->bigInteger('tour_id')->unsigned()->nullable();
            $table->foreign('tour_id')->references('id')->on('tournaments')->onDelete('cascade');

            $table->bigInteger('player_id')->unsigned()->nullable();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

            $table->bigInteger('coach_id')->unsigned()->nullable();
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');

            $table->bigInteger('match_id')->unsigned()->nullable();
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');

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
        Schema::dropIfExists('news_targets');
    }
}
