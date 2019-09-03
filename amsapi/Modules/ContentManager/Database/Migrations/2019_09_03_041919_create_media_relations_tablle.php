<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaRelationsTablle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('album', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('ContentCategories')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('media_gallery_id')->references('id')->on('mediagallery')->onDelete('set null')->onUpdate('cascade');

        });
        Schema::table('media', function (Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('ContentCategories')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('album_id')->references('id')->on('album')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('media_gallery_id')->references('id')->on('mediagallery')->onDelete('set null')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('');
    }
}
