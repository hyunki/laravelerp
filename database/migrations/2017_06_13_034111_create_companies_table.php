<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function(Blueprint $table)
        {
            $table->increments('company_id');
            $table->smallInteger('category')->unsigned();
            //공급자, 오너, 발주사
            $table->string('company_name',150);
            $table->string('company_address',250);
            $table->text('memo')->nullable();
            $table->boolean('active')->default(0);
            $table->timestamps();
            $table->unique('company_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
