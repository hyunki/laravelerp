<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsAddendumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts_addendum', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('contract_id')->unasigned();
                $table->string('type');
                $table->string('revised_no');
                $table->string('revised_name');
                $table->date('revised_startdate');
                $table->date('revised_enddate');
                $table->date('revised_date');
                $table->string('currency',3);
                $table->decimal('amount',18,4);
                $table->string('file');
                $table->text('memo');
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
        Schema::drop('contracts_addendum');
    }
}
