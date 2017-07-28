<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('businessplace_id')->unsigned();
            $table->integer('category_id')->unsigned();
            
            $table->string('name')->nullable();
            $table->string('model_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('asset_tag')->nullable();

            $table->integer('assigned_to')->unsigned()->nullable();
            $table->SmallInteger('status_id')->unsigend()->nullable();
            $table->decimal('purchase_price',20,2);
            $table->date('purchase_date')->nullable();
            $table->string('supplier')->nullable();
            $table->date('last_checkout')->nullable();
            $table->integer('warranty_month')->unsigned()->nullable();
            $table->SmallInteger('depreciate')->unsigned()->nullable();
            $table->text('notes')->nullable();
            $table->string('file_path');
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::create('asset_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id');
            $table->integer('component_id')->nullable();
            $table->integer('accessory_id')->nullable();
            $table->integer('consumable_id')->nullable();
            $table->text('notes')->nullable();
            $table->text('filename')->nullable();
            $table->timestamps();
            $table->softdeletes();//
        });

        Schema::create('asset_maintenance', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asset_id');
            $table->integer('supplier_id')->nullable();
            $table->string('asset_maintenance_type')->nullable();
            $table->string('title');
            $table->date('start_date');
            $table->date('completion_date')->nullable();
            $table->decimal('cost',20,2);
            $table->text('notes');
            $table->timestamps();
            $table->softdeletes();            //
        });

        Schema::create('asset_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable;
            $table->integer('asset_id')->nullable;
            $table->string('filename');
            $table->string('filenotes');
            $table->timestamps();
            $table->softdeletes();
            //
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type')->default('asset');
            $table->text('eula_text')->nullable();
            $table->SmallInteger('user_id')->nullable();

            $table->timestamps();
            $table->softdeletes();
        });

        Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
            $table->SmallInteger('category_id')->nullable();
            $table->SmallInteger('company_id')->nullable();
            $table->SmallInteger('employee_id')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_cost',20,2)->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::create('accesories', function (Blueprint $table) {
            $table->increments('id');
            $table->SmallInteger('category_id')->nullable();
            $table->SmallInteger('company_id')->nullable();
            $table->SmallInteger('employee_id')->nullable();
            $table->string('model_number')->nullable();
            $table->string('name')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_cost',20,2)->nullable();

            $table->timestamps();
            $table->softdeletes();
        });


        Schema::create('consumables', function (Blueprint $table) {
            $table->increments('id');
            $table->SmallInteger('category_id')->nullable();
            $table->SmallInteger('company_id')->nullable();
            $table->SmallInteger('employee_id')->nullable();
            $table->string('model_number')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::create('components_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->SmallInteger('user_id')->nullable();
            $table->SmallInteger('asset_id')->nullable();
            $table->SmallInteger('component_id')->nullable();
            $table->timestamps();
            $table->softdeletes();
            //
        });

        Schema::create('consumables_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->SmallInteger('user_id')->nullable();
            $table->SmallInteger('asset_id')->nullable();
            $table->SmallInteger('consumables_id')->nullable();
            $table->timestamps();
            $table->softdeletes();
        });

        Schema::create('accesories_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->SmallInteger('user_id')->nullable();
            $table->SmallInteger('asset_id')->nullable();
            $table->SmallInteger('accesories_id')->nullable();
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
        Schema::drop('assets');
        Schema::drop('categories');
        Schema::drop('asset_uploads');
        Schema::drop('asset_maintenance');
        Schema::drop('asset_logs');
        Schema::drop('components');
        Schema::drop('accesories');
        Schema::drop('consumables');
        Schema::drop('accesories_assets');
        Schema::drop('consumables_assets');
        Schema::drop('components_assets');

    }
}
