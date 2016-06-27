<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) 
        {
            $table->integer('view_count')->default(0);
        });
        Schema::table('articles', function (Blueprint $table) 
        {
            $table->integer('view_count')->default(0);
        });
        Schema::table('pages', function (Blueprint $table) 
        {
            $table->integer('view_count')->default(0);
        });
        Schema::table('faqs', function (Blueprint $table) 
        {
            $table->integer('view_count')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages', function (Blueprint $table) {
            //
        });
    }
}
