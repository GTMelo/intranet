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
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_rh_id')->unsigned()->nullable();
            $table->timestamps();

            $table->string('imagem')->nullable();
            $table->string('identificacao')->nullable();
            $table->string('orgao_expeditor')->nullable();
            $table->date('data_emissao')->nullable();
            $table->date('validade')->nullable();
            $table->string('zona')->nullable();
            $table->string('secao')->nullable();
            $table->string('serie')->nullable();

        });

        Schema::table('documentos', function (Blueprint $table) {
            $table->foreign('user_rh_id')->references('user_id')->on('users_rh')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
