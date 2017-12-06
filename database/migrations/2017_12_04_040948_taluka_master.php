<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TalukaMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taluka_master', function (Blueprint $table) {
            $table->increments('id');
            $table->char('code',1);
            $table->integer('state_id');
            $table->integer('district_id');
            $table->string('name',20);
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
        Schema::drop('taluka_master');
    }
}
