<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonesTable extends Migration
{
//    /**
//     * Run the migrations.
//     *
//     * @return void
//     */
//    public function up()
//    {
//        Schema::create('telefones', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//
//            $table->string('numero')->unique()->index();
//            $table->string('flags')->nullable();
//        });

//        Schema::create('flag_telefone', function (Blueprint $table) {
//
//            $table->integer('flag_id')->unsigned()->index();
//            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');
//
//            $table->integer('telefone_id')->unsigned()->index();
//            $table->foreign('telefone_id')->references('id')->on('telefones')->onDelete('cascade');
//
//            $table->primary(['flag_id', 'telefone_id']);
//        });

//        Schema::create('telefone_user', function (Blueprint $table) {
//
//            $table->integer('telefone_id')->unsigned();
//            $table->integer('user_id')->unsigned();
//
//            $table->foreign('telefone_id')->references('id')->on('telefones')->onDelete('cascade');
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//
//            $table->string('flags')->nullable();
//
//            $table->primary(['telefone_id', 'user_id']);
//        });
//    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('telefone_user');
//        Schema::dropIfExists('flag_telefone');
//        Schema::dropIfExists('telefones');
    }
}
