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
        Schema::create('paises', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('nome');
            $table->string('nome_completo')->nullable();
            $table->string('iso')->nullable();
            $table->string('adjetivo_patrio')->nullable();
            $table->string('codigo_telefone')->nullable();
        });

        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('pais_id')->nullable()->unsigned();
            $table->string('sigla')->nullable();
            $table->string('nome');
            $table->string('regiao')->nullable();
            $table->string('codigo_telefone')->nullable();

            $table->timestamps();
        });

        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome');
            $table->integer('estado_id')->nullable()->unsigned();

            $table->timestamps();
        });

        Schema::table('cidades', function (Blueprint $table) {
            $table->foreign('estado_id')->references('id')->on('estados');
        });

        Schema::table('estados', function (Blueprint $table) {
            $table->foreign('pais_id')->references('id')->on('paises');
        });

        Schema::table('rhs', function (Blueprint $table) {
            $table->integer('naturalidade_id')->default(1)->unsigned()->nullable();
            $table->foreign('naturalidade_id')->references('id')->on('cidades');
        });

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
        Schema::dropIfExists('cidade_flag');

        Schema::table('users_rh', function (Blueprint $table) {
            $table->dropForeign('users_rh_naturalidade_id_foreign');
        });

        Schema::table('cidades', function (Blueprint $table) {
            $table->dropForeign('cidades_estado_id_foreign');
        });

        Schema::table('estados', function (Blueprint $table) {
            $table->dropForeign('estados_pais_id_foreign');
        });

        Schema::dropIfExists('cidades');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('paises');
    }
}
