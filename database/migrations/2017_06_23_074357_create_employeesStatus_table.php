<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_status', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('employee_id')->unasigned();
            $table->string('businessPlace')->nullable();
            $table->string('department')->nullable();
            $table->string('dutyPlace')->nullable();
            $table->string('title')->nullable();
            $table->string('position')->nullable();

            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employees_status');
    }
}
