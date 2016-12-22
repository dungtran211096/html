<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create_REPLACE_ocCategoryRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_REPLACE_o_category_relations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('_REPLACE_o_id')->unsigned();
            $table->integer('_REPLACE_o_category_id')->unsigned();
            $table->timestamps();

            $table->foreign('_REPLACE_o_id')->references('id')->on('_REPLACE_m');
            $table->foreign('_REPLACE_o_category_id')->references('id')->on('_REPLACE_o_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('_REPLACE_o_category_relations');
    }
}
