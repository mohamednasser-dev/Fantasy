<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squad_players', function (Blueprint $table) {
            $table->primary(['squad_id', 'player_id']);

            $table->unique(["squad_id", "position"], 'player_position_unique');
            
            $table->bigInteger('squad_id')->unsigned();
            $table->foreign('squad_id')->references('id')->on('squads')->onDelete('cascade');
            $table->bigInteger('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->bigInteger('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->string('position')->nullable();
            $table->bigInteger('points')->default('0');            
            $table->enum('is_captain',['0','1'])->default('0');
            $table->enum('type',['basic','replace'])->default('basic');

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
        Schema::dropIfExists('squad_players');           
    }
}
