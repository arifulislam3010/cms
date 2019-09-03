<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NewsPost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Shoulder')->nullable();
            $table->string('headline')->nullable();
            $table->string('hanger')->nullable();
            $table->string('reporter')->nullable(); // user id 
            $table->string('athor')->nullable(); // user id 
            $table->integer('content_id')->unsigned()->nullable();
            $table->string('video_url')->nullable();
            $table->string('video_position')->nullable();
            $table->timestamp('share_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('Instant_article')->nullable();
            $table->string('topic')->nullable();
            $table->string('category')->nullable();    
            $table->string('division')->nullable();    
            $table->string('position')->nullable();    
            $table->string('scroll')->nullable();    

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
        Schema::dropIfExists('NewsPost');
    }
}
