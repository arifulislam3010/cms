<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('news_post_id')->unsigned()->nullable();
            $table->bigInteger('content_category_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('news_post_id')->references('id')->on('newspost')->onDelete('cascade');
            $table->foreign('content_category_id')->references('id')->on('contentcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_category');
    }
}
