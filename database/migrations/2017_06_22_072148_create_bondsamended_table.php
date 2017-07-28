<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondsamendedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bondsamended', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('bond_id')->unasigned();
            $table->smallInteger('UpdateReasonCode')->unasigned();
            $table->string('AdmendedNo')->nullable();
            $table->string('AmendedAmount')->nullable();
            $table->date('AmendedDate');
            $table->date('EndingDate');
            $table->date('RetrievalDate')->nullable();
            $table->string('status')->nullable();
            $table->boolean('Validity')->default('1');
            $table->text('Memo')->nullable();
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
        Schema::drop('bondsamended');
    }
}
