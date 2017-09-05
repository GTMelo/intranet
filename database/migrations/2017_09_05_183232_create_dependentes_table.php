<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDependentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tipo_dependentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descricao');
        });


        Schema::create('dependentes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('tipo_dependente_id')->unsigned()->nullable();
            $table->integer('user_rh_id')->unsigned()->nullable();

            $table->string('nome');
            $table->date('data_nascimento')->nullable();
            $table->string('cpf')->limit(11)->nullable();

        });

        Schema::table('dependentes', function (Blueprint $table) {
            $table->foreign('tipo_dependente_id')->references('id')->on('tipo_dependentes');
        });

        Schema::table('dependentes', function (Blueprint $table) {
            $table->foreign('user_rh_id')->references('user_id')->on('users_rh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependentes');
        Schema::dropIfExists('tipo_dependentes');
    }
}
