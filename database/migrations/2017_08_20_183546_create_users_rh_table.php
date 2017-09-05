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

            $table->string('nome_completo')->nullable();
            $table->enum('sexo', ['m', 'f'])->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('estado_civil')->nullable();
        });

        Schema::table('users_rh', function (Blueprint $table) {
            $table->primary('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::create('flag_user_rh', function (Blueprint $table) {

            $table->integer('flag_id')->unsigned()->index();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');

            $table->integer('user_rh_id')->unsigned()->index();
            $table->foreign('user_rh_id')->references('user_id')->on('users_rh')->onDelete('cascade');

            $table->primary(['flag_id', 'user_rh_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('flag_user_rh');
//        Schema::table('users_rh', function (Blueprint $table) {
//            $table->dropForeign('users_rh_user_id_foreign');
//        });
        Schema::dropIfExists('users_rh');
    }
}
