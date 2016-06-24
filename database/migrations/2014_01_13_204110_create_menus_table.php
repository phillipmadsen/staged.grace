<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title', 255);
            $table->string('icon_class')->nullable();
            $table->string('url', 255);
            $table->integer('order');
            $table->integer('parent_id');
            $table->string('type', 10);
            $table->string('option', 255)->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            $table->string('lang', 20);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('menus');
    }
}
