<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('unidade_superior_id')->unsigned()->nullable();
            $table->string('sigla', 10)->nullable();
            $table->string('descricao')->nullable();
            $table->text('tldr')->nullable();
        });



        Schema::table('unidades', function (Blueprint $table) {
            $table->foreign('unidade_superior_id')->references('id')->on('unidades')->onDelete('set null');
        });



        Schema::table('rhs', function (Blueprint $table) {
            $table->integer('unidade_id')->default(1)->unsigned()->nullable();
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('set null');
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
            $table->dropForeign('users_rh_unidade_id_foreign');
        });
        Schema::dropIfExists('unidades');
    }
}
