<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoDocumentosTable extends Migration
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

        Schema::table('documentos', function (Blueprint $table) {

            $table->integer('tipo_documento_id')->unsigned()->nullable();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('set null');

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

        Schema::dropIfExists('tipo_documentos');
    }
}
