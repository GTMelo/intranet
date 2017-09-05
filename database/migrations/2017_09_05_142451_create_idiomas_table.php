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
            $table->timestamps();
            $table->softDeletes();

            $table->string('descricao');
        });

        Schema::create('idioma_user_rh', function (Blueprint $table) {
            $table->integer('idioma_id')->unsigned()->index();
            $table->integer('user_rh_id')->unsigned()->index();

            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
            $table->foreign('user_rh_id')->references('user_id')->on('users_rh')->onDelete('cascade');
            $table->primary(['idioma_id', 'user_rh_id']);

            $table->enum('leitura', ['basico','avancado','fluente']);
            $table->enum('escrita', ['basico','avancado','fluente']);
            $table->enum('compreensao', ['basico','avancado','fluente']);
            $table->enum('conversacao', ['basico','avancado','fluente']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('idioma_user_rh');
        Schema::dropIfExists('idiomas');
    }
}
