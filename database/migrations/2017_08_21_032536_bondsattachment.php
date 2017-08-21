<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bondsattachment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bond_attachment', function (Blueprint $table) {
                $table->increments('id');
                $table->string('table_name');
                $table->integer('subject_id')->unsigned();
                $table->string('original_filename',255);
                $table->blob('file');
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
        Schema::drop('bond_attachment');
    }
}
