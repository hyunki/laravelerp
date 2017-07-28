<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('nameKor',20);
            $table->string('alpha3',3)->unique();
            $table->string('alpha2',2)->unique();
            $table->string('number',3)->unique();
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
        Schema::drop('countries');
    }
}