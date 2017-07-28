<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondContractTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bond_contract', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bond_id')->unasigned();
            $table->integer('contract_id')->unasigned();
            // $table->foreign('contract_id')->references('id')->on('contracts');
            $table->timestamps();

            $table->unique(['bond_id','contract_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bond_contract');
    }
}
