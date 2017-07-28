<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codes', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('tableName',50);
            $table->string('fieldName',50);
            $table->smallInteger('codeNumber')->unsigned();
            $table->text('codeValue')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();

           
            $table->unique('tableName','fieldName','codeNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('code_book');
    }
}
