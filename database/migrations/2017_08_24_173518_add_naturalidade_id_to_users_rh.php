<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNaturalidadeIdToUsersRh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_rh', function (Blueprint $table) {
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
            $table->dropForeign('users_rh_naturalidade_id_foreign');
        });
    }
}
