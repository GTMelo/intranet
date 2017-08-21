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
            $table->integer('unidade_superior_id')->unsigned()->nullable();
            $table->string('sigla', 10)->nullable();
            $table->string('descricao')->nullable();
            $table->text('tldr')->nullable();
            $table->integer('status_id')->unsigned()->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('unidades', function (Blueprint $table) {
            $table->foreign('unidade_superior_id')->references('id')->on('unidades')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unidades');
    }
}
