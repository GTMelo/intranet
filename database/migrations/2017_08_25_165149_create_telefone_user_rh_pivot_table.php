<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefoneUserRhPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefone_user_rh', function (Blueprint $table) {

            $table->integer('telefone_id')->unsigned();
            $table->integer('user_rh_id')->unsigned();

            $table->foreign('telefone_id')->references('id')->on('telefones')->onDelete('cascade');
            $table->foreign('user_rh_id')->references('user_id')->on('users_rh')->onDelete('cascade');

            $table->primary(['telefone_id', 'user_rh_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefone_user_rh');
    }
}
