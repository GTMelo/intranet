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
            $table->timestamps();
            $table->softDeletes();

            $table->integer('naturalidade_id')->default(1)->unsigned()->nullable();
            $table->integer('unidade_id')->default(1)->unsigned()->nullable();
            $table->integer('cargo_id')->default(1)->unsigned()->nullable();

            $table->string('nome_completo')->nullable();
            $table->enum('sexo', ['m', 'f'])->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('estado_civil')->nullable();
        });

        Schema::table('users_rh', function (Blueprint $table) {
            $table->primary('user_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('set null');
            $table->foreign('cargo_id')->references('id')->on('cargos');
            $table->foreign('naturalidade_id')->references('id')->on('cidades');

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
            $table->dropForeign('users_rh_user_id_foreign');
            $table->dropForeign('users_rh_unidade_id_foreign');
            $table->dropForeign('users_rh_cargo_id_foreign');
            $table->dropForeign('users_rh_naturalidade_id_foreign');
        });
        Schema::dropIfExists('users_rh');
    }
}
