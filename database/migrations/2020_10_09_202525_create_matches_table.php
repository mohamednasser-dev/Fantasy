<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('home_club_id')->unsigned();
            $table->foreign('home_club_id')->references('id')->on('clubs')->onDelete('cascade');

            $table->bigInteger('away_club_id')->unsigned();
            $table->foreign('away_club_id')->references('id')->on('clubs')->onDelete('cascade');

            $table->time('time');
            $table->date('date');
            $table->string('result')->default('0  -  0');
            $table->enum('status',['not started','started','ended'])->default('not started');
            $table->bigInteger('stadium_id')->unsigned();
            $table->foreign('stadium_id')->references('id')->on('stadiums');


            $table->bigInteger('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tournaments')->onDelete('cascade');
            
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
        Schema::dropIfExists('matches');
    }
}
