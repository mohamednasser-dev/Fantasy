<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryGwlaPointsTable extends Migration
{
    public function up()
    {
        Schema::create('history_gwla_points', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('points')->nullable();
            $table->bigInteger('gwla_id')->unsigned();
            $table->foreign('gwla_id')->references('id')->on('gwalats')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('history_gwla_points');
    }
}
