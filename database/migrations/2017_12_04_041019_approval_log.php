<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApprovalLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approve_log', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->char('type_code',5);
            $table->char('approval_type',5);
            $table->integer('type_count');
            $table->char('status',1);
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
        Schema::drop('approve_log');
    }
}
