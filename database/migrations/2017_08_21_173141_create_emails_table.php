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
//        Schema::create('emails', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//            $table->softDeletes();
//            $table->string('flags')->nullable();
//
//            $table->string('address')->unique();
//        });
//
//        Schema::create('email_user', function (Blueprint $table) {
//            $table->integer('email_id')->unsigned()->index();
//            $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
//            $table->integer('user_id')->unsigned()->index();
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->string('flags')->nullable();
//            $table->primary(['email_id', 'user_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('email_user');
//        Schema::dropIfExists('emails');
    }
}
