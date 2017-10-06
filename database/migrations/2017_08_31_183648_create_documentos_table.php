<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('descricao');
        });

        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->integer('tipo_documento_id')->unsigned()->nullable();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('set null');

            $table->string('imagem')->nullable();
            $table->string('identificacao')->nullable();
            $table->string('orgao_expedidor')->nullable();
            $table->date('data_emissao')->nullable();
            $table->date('validade')->nullable();
            $table->string('zona')->nullable();
            $table->string('secao')->nullable();
            $table->string('serie')->nullable();

        });

        Schema::table('documentos', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            $table->dropForeign('documentos_tipo_documento_id_foreign');
        });

        Schema::dropIfExists('documentos');

        Schema::dropIfExists('tipo_documentos');
    }
}
