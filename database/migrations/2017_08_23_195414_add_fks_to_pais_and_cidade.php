<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksToPaisAndCidade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('cidades', function (Blueprint $table) {
            $table->foreign('pais_id')->references('id')->on('paises');
        });

        Schema::table('paises', function (Blueprint $table) {
            $table->foreign('capital_id')->references('id')->on('cidades');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
