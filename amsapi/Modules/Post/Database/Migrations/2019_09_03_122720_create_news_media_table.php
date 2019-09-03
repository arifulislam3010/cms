<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_post_id')->unsigned()->nullable();
            $table->bigInteger('media_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('news_post_id')->references('id')->on('newspost')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_media');
    }
}
