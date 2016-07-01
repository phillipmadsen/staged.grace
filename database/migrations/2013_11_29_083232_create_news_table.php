<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title', 255);
            $table->text('content');
            $table->string('slug')->nullable();
            $table->date('datetime');
            $table->timestamps();
            $table->integer('featured_image_id')->nullable();
            $table->boolean('is_published')->default(true);
            $table->string('path', 255)->nullable();
            $table->string('file_name', 255)->nullable();
            $table->integer('file_size')->nullable();
            $table->string('lang', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('news');
    }
}
