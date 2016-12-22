<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username');
            $table->string('avatar');
            $table->boolean('admin');
            $table->boolean('active');
            $table->string('password');
            $table->string('msv');
            $table->string('birthday');
            $table->string('uni');
            $table->string('school_year');
            $table->string('faculty');
            $table->string('dd_renluyen');
            $table->string('ht_gpa');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
