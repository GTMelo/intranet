<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('cidade_id')->default(1)->unsigned()->nullable();

            $table->string('logradouro')->nullable();
            $table->string('cep')->nullable();

            $table->timestamps();
        });

        Schema::table('enderecos', function (Blueprint $table) {

            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}
