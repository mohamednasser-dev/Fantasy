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

            //remove id after migrate from this table and ad complix primaryKey [home_id,away_id,gwla_id] and add id manul but not primary key will be
            // autoIncrement and unique only
            $table->id();
            $table->bigInteger('home_club_id')->unsigned();
            $table->bigInteger('away_club_id')->unsigned();
            $table->time('time');
            $table->date('date');
            $table->string('home_score')->default('0');
            $table->string('away_score')->default('0');
            $table->enum('status',['not started','started','ended'])->default('not started');
            $table->bigInteger('stadium_id')->unsigned();
            $table->bigInteger('tour_id')->unsigned();
            $table->bigInteger('gwla_id')->unsigned();
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
