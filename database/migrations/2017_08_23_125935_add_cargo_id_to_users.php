<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCargoIdToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('cargo_id')->default(1)->unsigned()->after('password');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('cargo_id')->references('id')->on('cargos');
        });


    }

    /**
     * Reverse the migrations.
     *A
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_cargo_id_foreign');
            $table->dropColumn('cargo_id');
        });
    }
}
