<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSquadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squads', function (Blueprint $table) {
            $table->id();
            $table->string('squad_name');
            $table->enum('squad_type',['1st','2nd'])->default('1st');
            $table->bigInteger('points')->default('0');         

            $table->bigInteger('coach_id')->unsigned()->nullable();
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');

            $table->bigInteger('coach_points')->default(0);

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('squads');
    }
}
