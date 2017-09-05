<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_vinculos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descricao');
        });

//        Schema::create('vinculos', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//
//            $table->integer('user_rh_id')->unsigned();
//
//            $table->string('orgao_origem')->nullable();
//            $table->string('matricula_origem')->nullable();
//            $table->string('cargo_origem')->nullable();
//            $table->string('classe')->nullable();
//            $table->string('padrao')->nullable();
//            $table->string('funcao')->nullable();
//            $table->string('denominacao_funcao')->nullable();
//            $table->string('ato_nomeacao')->nullable();
//            $table->date('data_dou')->nullable();
//            $table->string('empresa')->nullable();
//            $table->string('instituicao_ensino')->nullable();
//            $table->string('nivel')->nullable();
//            $table->string('curso')->nullable();
//            $table->string('semestre')->nullable();
//            $table->string('numero_contrato')->nullable();
//            $table->date('data_contrato')->nullable();
//            $table->string('orgao_origem')->nullable();
//            $table->string('supervisor_id')->unsigned()->nullable();
//        });
//
//        Schema::table('vinculos', function (Blueprint $table) {
//            $table->foreign('user_rh_id')->references('user_id')->on('users_rh')->onDelete('cascade');
//            $table->foreign('supervisor_id')->references('user_id')->on('users_rh')->onDelete('set null');
//        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculos');
        Schema::dropIfExists('tipo_vinculos');
    }
}
