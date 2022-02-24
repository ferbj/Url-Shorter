<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablaLinks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
              $table->increments('id');
              $table->text('url');
              $table->string('hash',500);
<<<<<<< HEAD
=======
			 $table->integer('contador',11);
>>>>>>> fe3f4d5859556a7c233b7a410e3c3e0c10821201
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
       Schema::drop('links');
    }
}
