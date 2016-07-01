<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('slug')->nullable();
            $table->string('path', 255);
            $table->string('file_name', 255);
            $table->integer('file_size');
            $table->integer('project_image_id')->nullable();
            $table->string('lang', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('faqs');
    }
}
