<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('grids', function (Blueprint $table) {
          //
          $table->increments('id')->unsigned();
          $table->integer('post_id')->unsigned();
          $table->string('x');
          $table->string('y');
          $table->string('width');
          $table->string('height');
          $table->timestamps();
      });

      Schema::table('grids', function(Blueprint $table) {
         $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE')->onUpdate('CASCADE');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
