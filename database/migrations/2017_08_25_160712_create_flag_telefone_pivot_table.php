<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlagTelefonePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flag_telefone', function (Blueprint $table) {
            $table->integer('flag_id')->unsigned()->index();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');
            $table->integer('telefone_id')->unsigned()->index();
            $table->foreign('telefone_id')->references('id')->on('telefones')->onDelete('cascade');
            $table->primary(['flag_id', 'telefone_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flag_telefone');
    }
}
