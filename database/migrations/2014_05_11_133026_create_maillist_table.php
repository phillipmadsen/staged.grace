<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMaillistTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maillist', function (Blueprint $table) {

            $table->increments('id');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('maillist');
    }
}
