<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksEnderecoDadoBancarioToUserRh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users_rh', function (Blueprint $table) {
            $table->integer('endereco_id')->default(1)->unsigned()->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('set null');

            $table->integer('dado_bancario_id')->default(1)->unsigned()->nullable();
            $table->foreign('dado_bancario_id')->references('id')->on('dados_bancarios')->onDelete('set null');
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
            $table->dropForeign('users_rh_endereco_id_foreign');
            $table->dropForeign('users_rh_dado_bancario_id_foreign');
            $table->dropColumn(['endereco_id', 'dado_bancario_id']);
        });
    }
}
