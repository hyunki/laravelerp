<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->increments('contractor_id');
            $table->string('reg_name');
            $table->string('reg_no',20)->nullable();
            $table->string('country',3)->nullable;
            $table->integer('zipcode')->unasigend;
            $table->string('address')->nullable;
            $table->string('address2')->nullable;
            $table->string('type',50)->nullable;
            $table->string('item',50)->nullable;
            $table->text('memo')->nullable;
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contractors');
    }
}
