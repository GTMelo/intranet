<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailUserRhPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_user_rh', function (Blueprint $table) {
            $table->integer('email_id')->unsigned()->index();
            $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            $table->integer('user_rh_id')->unsigned()->index();
            $table->foreign('user_rh_id')->references('user_id')->on('users_rh')->onDelete('cascade');
            $table->primary(['email_id', 'user_rh_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('email_user_rh');
    }
}
