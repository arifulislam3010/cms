<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tag', function (Blueprint $table) {
            $table->bigIncrements('id');
<<<<<<< HEAD:amsapi/Modules/Post/Database/Migrations/2019_09_03_063324_create_Tag_table.php
            $table->string('text')->nullable();
=======
            $table->string('title')->nullable();
            $table->string('cover')->nullable();
            $table->integer('status')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
>>>>>>> 6dbdec998fbfec9130221648964b81dbcf896918:amsapi/Modules/Setting/Database/Migrations/2019_08_16_042315_create_topics_table.php
            $table->timestamps();
        });

        Schema::table('topics', function(Blueprint $table){
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tag');
    }
}
