<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadeEstadoPaisTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('rhs', function (Blueprint $table){
            $table->string('naturalidade');
            $table->string('nacionalidade');
        });

        // TODO implementar na versão 1.1
//        Schema::create('paises', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//
//            $table->string('nome');
//            $table->string('nome_completo')->nullable();
//            $table->string('iso')->nullable();
//            $table->string('adjetivo_patrio')->nullable();
//            $table->string('codigo_telefone')->nullable();
//        });
//
//        Schema::create('estados', function (Blueprint $table) {
//            $table->increments('id');
//
//            $table->integer('pais_id')->nullable()->unsigned();
//            $table->string('sigla')->nullable();
//            $table->string('nome');
//            $table->string('regiao')->nullable();
//            $table->string('codigo_telefone')->nullable();
//
//            $table->timestamps();
//        });
//
//        Schema::create('cidades', function (Blueprint $table) {
//            $table->increments('id');
//
//            $table->string('nome');
//            $table->integer('estado_id')->nullable()->unsigned();
//            $table->string('flags')->nullable();
//
//            $table->timestamps();
//        });
//
//        Schema::table('cidades', function (Blueprint $table) {
//            $table->foreign('estado_id')->references('id')->on('estados');
//        });
//
//        Schema::table('estados', function (Blueprint $table) {
//            $table->foreign('pais_id')->references('id')->on('paises');
//        });
//
//        Schema::table('rhs', function (Blueprint $table) {
//            $table->integer('naturalidade_id')->unsigned()->nullable();
//            $table->foreign('naturalidade_id')->references('id')->on('cidades');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rhs', function (Blueprint $table){
            $table->dropColumn('naturalidade');
            $table->dropColumn('nacionalidade');
        });

//        Schema::dropIfExists('cidade_flag');

//        Schema::table('rhs', function (Blueprint $table) {
//            $table->dropForeign('rhs_naturalidade_id_foreign');
//        });
//
//        Schema::table('cidades', function (Blueprint $table) {
//            $table->dropForeign('cidades_estado_id_foreign');
//        });
//
//        Schema::table('estados', function (Blueprint $table) {
//            $table->dropForeign('estados_pais_id_foreign');
//        });

        Schema::dropIfExists('cidades');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('paises');
    }
}
