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
            $table->timestamps();

            $table->integer('cidade_id')->default(1)->unsigned()->nullable();

            $table->string('logradouro')->nullable();
            $table->string('cep')->nullable();
        });

        Schema::table('enderecos', function (Blueprint $table) {

            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('set null');

        });

        Schema::table('rhs', function (Blueprint $table) {
            $table->integer('endereco_id')->default(1)->unsigned()->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rhs', function (Blueprint $table) {
            $table->dropForeign('rhs_endereco_id_foreign');
            $table->dropColumn('endereco_id');
        });
        Schema::dropIfExists('enderecos');
    }
}
