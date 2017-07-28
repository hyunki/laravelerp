<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurances', function (Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('CompanyId')->unasigned();
            $table->smallInteger('AgentId')->unasigned();
            $table->string('Category',30);
            $table->string('ContractNumber',30);
            $table->string('InsuranceName',150);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->string('cur1',3)->nullable();
            $table->string('Premium',20);
            $table->string('PremiumMode', 5)->nullable();
            $table->boolean('inactive')->default(1);
            $table->string('country', 3)->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->text('Memo')->nullable();
           
            $table->unique('ContractNumber');
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
