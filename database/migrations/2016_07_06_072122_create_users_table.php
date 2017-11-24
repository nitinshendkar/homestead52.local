<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',60);
            $table->string('lastname',60)->nullable();
            $table->longtext('home_address')->nullable();
            $table->longtext('office_address')->nullable();
            $table->integer('phone');
            $table->integer('emp_id');
            $table->date('dob');
            $table->date('doj');
            $table->binary('photo');
            $table->binary('signature');
            $table->string('password',100);
            $table->string('email')->unique();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
