<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRelationAndApprovalModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user_approval', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('parent_id');
            $table->text('aprroval_module');
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
        Schema::drop('user_approval');
    }
}
