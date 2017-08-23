<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersRhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_rh', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->string('nome_completo');
            $table->string('nome_curto');
            $table->date('data_nascimento')->nullable();
            $table->integer('unidade_id')->unsigned()->default(1)->nullable();
            $table->integer('cargo_id')->default(1)->unsigned();
            $table->integer('sexo_id')->unsigned()->nullable();
            $table->string('pai')->nullable();
            $table->string('mae')->nullable();
            $table->string('nacionalidade')->nullable();
            $table->string('naturalidade')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('conjuge')->nullable();
            $table->
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users_rh', function (Blueprint $table) {
            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('set default');
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_rh', function (Blueprint $table) {
            Schema::dropIfExists('users_rh');
        });
    }
}
