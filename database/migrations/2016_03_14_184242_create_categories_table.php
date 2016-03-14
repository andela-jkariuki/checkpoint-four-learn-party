<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('category_video', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');

            $table->integer('video_id')->unsigned();
            $table->foreign('video_id')
                  ->references('id')
                  ->on('videos');

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
        Schema::table('category_video', function ($table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['video_id']);
        });

        Schema::drop('category_video');
        Schema::drop('categories');
    }
}
