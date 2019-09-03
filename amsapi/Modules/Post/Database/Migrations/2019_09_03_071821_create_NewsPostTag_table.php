<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_post_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_post_id')->unsigned()->nullable();
            $table->bigInteger('tag_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('news_post_id')->references('id')->on('newspost')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tag')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NewsPostTag');
    }
}
