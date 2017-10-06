<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descricao');
        });

        Schema::create('idioma_rh', function (Blueprint $table) {
            $table->integer('idioma_id')->unsigned()->index();
            $table->integer('rh_id')->unsigned()->index();

            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
            $table->foreign('rh_id')->references('user_id')->on('rhs')->onDelete('cascade');
            $table->primary(['idioma_id', 'rh_id']);

            $table->enum('leitura', ['básico','avançado','fluente']);
            $table->enum('escrita', ['básico','avançado','fluente']);
            $table->enum('compreensao', ['básico','avançado','fluente']);
            $table->enum('conversacao', ['básico','avançado','fluente']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('idioma_rh');
        Schema::dropIfExists('idiomas');
    }
}
