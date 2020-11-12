<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGwalatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gwalats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('start_time');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->time('end_time');
            $table->bigInteger('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->enum('status',['inprogres','ended'])->default('inprogres');
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
        Schema::dropIfExists('gwalats');
    }
}
