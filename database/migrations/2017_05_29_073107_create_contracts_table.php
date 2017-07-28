<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('no', 45);
            $table->text('name')->nullable();
            $table->string('code',14);
            $table->date('date');
            $table->integer('cur1')->nullable();
            $table->string('TotalAmount',100)->nullable();
            $table->integer('cur2')->nullable();
            $table->string('epAmount',100)->nullable();
            $table->integer('cur3')->nullable();
            $table->string('cAmount',45)->nullable();
            $table->string('contractor', 45)->nullable();
            $table->string('owner', 45)->nullable();
            $table->string('country', 3)->nullable();
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
        Schema::drop('contracts');
    }
}
