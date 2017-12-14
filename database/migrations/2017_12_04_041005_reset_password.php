<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResetPassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reset_password_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('reset_by');
            $table->integer('reset_of');
            $table->char('mode_of_info',5);
            $table->dateTime('reset_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reset_password_log');
    }
}
