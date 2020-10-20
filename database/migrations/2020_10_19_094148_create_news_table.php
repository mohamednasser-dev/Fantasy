<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');             
            $table->string('key_words');             
            $table->string('description');
            
            $table->enum('type',['player', 'coach', 'club', 'tournament']);
            
            $table->bigInteger('club_id')->unsigned();
            $table->foreign('club_id')->references('id')->on('clubs')->onDelete('cascade');

            $table->bigInteger('tour_id')->unsigned();
            $table->foreign('tour_id')->references('id')->on('tournaments')->onDelete('cascade');

            $table->bigInteger('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');

            $table->bigInteger('coach_id')->unsigned();
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade');

            $table->bigInteger('news_category_id')->unsigned();
            $table->foreign('news_category_id')->references('id')->on('news_categories')->onDelete('cascade');

            $table->string('image');
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
        Schema::dropIfExists('news');
    }
}
