<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonds', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('contract_id')->unasigned();
            $table->string('Issuer');
            $table->string('Category');
            $table->string('Format');
            $table->boolean('Outbound')->default('0');
            $table->string('Method')->default('Mail');
            $table->string('Beneficiary');
            $table->string('LgNumber')->unique();
            $table->string('Type');
            $table->smallInteger('BondCurrency')->unasigned();
            $table->string('Amount');
            $table->smallInteger('FeeCurrency')->unasigned()->nullable();
            $table->string('Fee')->nullable();
            $table->date('IssuingDate');
            $table->date('StartingDate');
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
        Schema::drop('bonds');
    }
}
