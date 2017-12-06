<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmployeeAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_address', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->char('address_type', 5);
            $table->string('location',50);
            $table->text('address_line_1');
            $table->text('address_line_2');
            $table->integer('district_id');
            $table->integer('taluka_id');
            $table->integer('state_id');
            $table->string('pin_code');
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
       Schema::drop('employee_address');
    }
}
