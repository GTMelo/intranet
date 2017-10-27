<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('abreviacao');
            $table->string('descricao');
        });

        Schema::table('rhs', function (Blueprint $table) {
            $table->integer('cargo_id')->unsigned()->nullable();
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rhs', function (Blueprint $table) {
            $table->dropForeign('rhs_cargo_id_foreign');
        });
        Schema::dropIfExists('cargos');
    }
}
