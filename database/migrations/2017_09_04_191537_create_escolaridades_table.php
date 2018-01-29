<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscolaridadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

//        Schema::create('tipo_escolaridades', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('descricao');
//            $table->tinyInteger('nivel')->unsigned()->comment('Reflete o nível de escolaridade do tipo, numa escala de ensino fundamental a pós-graduação. 0 significa que o tipo não possui nível definido');
//        });

//        Schema::create('escolaridades', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//            $table->softDeletes();
//
//            $table->integer('rh_id')->unsigned();
//            $table->integer('tipo_escolaridade_id')->unsigned()->nullable();
//
//            $table->string('titulo');
//            $table->enum('situacao', ['cursando', 'completo'])->default('cursando');
//            $table->string('instituicao')->nullable();
//            $table->date('inicio')->nullable();
//            $table->date('termino')->nullable();
//
//        });

//        Schema::table('escolaridades', function (Blueprint $table) {
//            $table->foreign('rh_id')->references('user_id')->on('rhs')->onDelete('cascade');
//            $table->foreign('tipo_escolaridade_id')->references('id')->on('tipo_escolaridades');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('escolaridades', function (Blueprint $table) {
//            $table->dropForeign('escolaridades_tipo_escolaridade_id_foreign');
//        });
//
//        Schema::dropIfExists('escolaridades');
//        Schema::dropIfExists('tipo_escolaridades');
    }
}
