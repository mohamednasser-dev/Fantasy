<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForignToMatches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function (Blueprint $table) {
            //$table->primary(['home_club_id', 'away_club_id','gwla_id']);
            $table->foreign('home_club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('away_club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->foreign('stadium_id')->references('id')->on('stadiums')->onDelete('cascade');
            $table->foreign('tour_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('gwla_id')->references('id')->on('gwalats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matches', function (Blueprint $table) {
            //
        });
    }
}
