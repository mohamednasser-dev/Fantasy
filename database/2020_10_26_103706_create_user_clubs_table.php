<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClubsTable extends Migration
{
    public function up()
    {
        Schema::create('user_clubs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('club_id')->unsigned()->unique();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');
            $table->enum('type',['monitor','editor'])->default('editor');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('user_clubs');
    }
}
