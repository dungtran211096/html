<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserCol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('school_id')->unsigned();
            $table->dropColumn('uni');
            $table->dropColumn('school_year');
            $table->dropColumn('faculty');
            $table->dropColumn('dd_renluyen');
            $table->dropColumn('ht_gpa');

            $table->foreign('school_id')->references('id')->on('schools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_school_id_foreign');
        });
    }
}
