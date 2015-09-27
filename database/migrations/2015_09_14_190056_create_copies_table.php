<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coin_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('year');
            $table->tinyInteger('state');
            $table->text('observations');
            $table->string('img_front',30);
            $table->string('img_back',30);
            $table->tinyInteger('stat');
            $table->timestamps();

            $table->foreign('coin_id')->references('id')->on('coins')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('copies');
    }
}
