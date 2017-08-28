<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailFlagPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_flag', function (Blueprint $table) {
            $table->integer('email_id')->unsigned()->index();
            $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');

            $table->integer('flag_id')->unsigned()->index();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');

            $table->primary(['email_id', 'flag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('email_flag');
    }
}
