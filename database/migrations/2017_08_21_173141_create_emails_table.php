<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('address')->unique();
        });

        Schema::create('email_flag', function (Blueprint $table) {
            $table->integer('email_id')->unsigned()->index();
            $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');

            $table->integer('flag_id')->unsigned()->index();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');

            $table->primary(['email_id', 'flag_id']);
        });

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
        Schema::dropIfExists('email_user_rh');
        Schema::dropIfExists('email_flag');
        Schema::dropIfExists('emails');
    }
}
