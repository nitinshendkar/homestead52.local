<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfessionalDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_details', function (Blueprint $table) {
            $table->increments('id');
            $table->ineger('user_id');
            $table->string('designation',30);
            $table->string('organization',100);
            $table->char('current_working',1);
            $table->date('joining_date');
            $table->date('reveliving_date');
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
        Schema::drop('professional_details');
    }
}
