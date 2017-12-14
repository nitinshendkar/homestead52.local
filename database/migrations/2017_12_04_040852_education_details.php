<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EducationDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('degree',10);
            $table->string('board',30);
            $table->integer('percentage');
            $table->string('specialization',20);
            $table->string('year_of_passing',12);
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
        Schema::drop('education_details');
    }
}
