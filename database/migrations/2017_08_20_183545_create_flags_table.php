<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('code');
            $table->string('display_name')->nullable();
            $table->string('description')->nullable();
        });

        Schema::create('flag_user', function (Blueprint $table) {
            $table->integer('flag_id')->unsigned()->index();
            $table->foreign('flag_id')->references('id')->on('flags')->onDelete('cascade');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['flag_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flag_user');
        Schema::dropIfExists('flags');
    }
}
