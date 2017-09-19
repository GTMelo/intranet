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
            $table->softDeletes();

            $table->string('cpf')->unique();
            $table->string('nome_curto')->unique();
            $table->string('slug')->unique();
            $table->string('nome_completo')->nullable();
            $table->string('password');

            $table->rememberToken();
            $table->timestamp('previous_last_login')->nullable();
            $table->timestamp('current_last_login')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
