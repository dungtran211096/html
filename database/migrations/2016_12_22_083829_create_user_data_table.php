<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id') -> unsigned();
            $table->foreign('user_id') -> references('id') -> on ('users');
            $table->longtext('daoduc');
            $table->longtext('hoctap');
            $table->longtext('theluc');
            $table->longtext('tinhnguyen');
            $table->longtext('hoinhap');
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
        Schema::drop('user_data');
    }
}
