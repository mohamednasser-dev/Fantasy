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
            $table->string('model');
            $table->bigInteger('target_id');
            
            $table->bigInteger('news_id')->unsigned();
            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');

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
