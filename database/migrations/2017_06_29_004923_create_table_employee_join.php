<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployeeJoin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_join', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('employee_id');
            $table->date('joined_at');
            $table->date('resigned_at');
            $table->string('resign_reason');
            $table->string('contract_filename');
            $table->string('resignation_filename');

            $table->timestamps();
            //
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee_join');
    }
}
