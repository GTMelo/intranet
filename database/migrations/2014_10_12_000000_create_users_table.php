<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('cpf')->unique();
            $table->string('nome_completo')->nullable();
            $table->string('nome_curto')->unique();
            $table->string('slug')->unique();
            $table->string('foto')->nullable();
            $table->string('password');
            $table->boolean('is_aprovado')->default(false);
            $table->boolean('is_suspenso')->default(false);

            $table->rememberToken();
            $table->timestamp('previous_last_login')->nullable();
            $table->timestamp('current_last_login')->nullable();

        });

//        Schema::create('rhs', function (Blueprint $table) {
//            $table->integer('user_id')->unsigned()->index();
//
//            $table->enum('sexo', ['m', 'f'])->nullable();
//            $table->date('data_nascimento')->nullable();
//            $table->string('estado_civil')->nullable();
//
//            $table->primary('user_id');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('rhs');
        Schema::dropIfExists('users');
    }
}
