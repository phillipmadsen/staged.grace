<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesPathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_paths', function(Blueprint $table)
		{
		    $table->increments('id');

		    $table->string('path_720_box');
		    $table->string('path_440_catalog');
		    $table->string('path_270_grid');
		    $table->string('path_300_additional');
		    $table->string('path_100_prodthumb');
		    $table->string('path_64_thumb');

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
        Schema::drop('image_paths');
    }
}
