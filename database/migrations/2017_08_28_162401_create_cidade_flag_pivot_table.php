<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadeFlagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidade_flag', function (Blueprint $table) {

            $table->integer('cidade_id')->unsigned()->index();
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('cascade');

            $table->integer('flag_id')->unsigned()->index();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');

            $table->primary(['cidade_id', 'flag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cidade_flag');
    }
}
