<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoleMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_master', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role_type',50);
            $table->string('role_name',50);
            $table->text('permission');
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('role_master');
    }
}
