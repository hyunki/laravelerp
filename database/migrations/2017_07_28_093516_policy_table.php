<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longtext('description');
            $table->timestamps();
            $table->softdeletes();
        });
        
        Schema::create('policies_pages', function (Blueprint $table) {
            $table->increments('id');
            //
        });

        Schema::create('policy_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('section');
            $table->longtext('contents');
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
        Schema::drop('policies');
    }
}
