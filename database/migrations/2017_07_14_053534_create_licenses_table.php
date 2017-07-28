<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('software_id')->nullable();
            $table->string('name')->nullable();
            $table->text('serial')->nullable();
            $table->text('notes')->nullable();
            $table->smallInteger('seats')->default(1);
            $table->string('license_name')->nullable();
            $table->string('license_email')->nullable();
            $table->boolean('reassignable')->default(1);
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_price',20,2);
            $table->date('expiration_date')->nullable();
            $table->date('termination_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('checkout', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('assigned_to')->nullabe();
            $table->timestamps();
            $table->softDeletes();
            //
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('licenses');
        Schema::drop('checkout');
    }
}
