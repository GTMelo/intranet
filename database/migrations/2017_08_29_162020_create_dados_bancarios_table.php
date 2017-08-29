<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDadosBancariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_bancarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('banco_id')->default(1)->unsigned()->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->timestamps();
        });

        Schema::create('bancos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo_banco');
            $table->string('nome');
            $table->timestamps();
        });

        Schema::table('dados_bancarios', function (Blueprint $table) {
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dados_bancarios', function (Blueprint $table) {
            $table->dropForeign('dados_bancarios_banco_id_foreign');
        });
        Schema::dropIfExists('bancos');
        Schema::dropIfExists('dados_bancarios');
    }
}