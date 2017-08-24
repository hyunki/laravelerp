<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName',30);
            $table->string('lastName',30);
            $table->string('idNumber',255)->unique();
            $table->timestamps();
        });

        Schema::create('employee_levelofacademic', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->string('degree')->nullable() //high school, college, bachelor, master, PhD
            $table->string('institution_name');
            $table->string('major')->nullable();
            $table->date('entrance_date')->nullable();
            $table->date('graduate_date')->nullable();
            $table->string('status')->nullable(); // 재학, 수료(논문불합격), 졸업유예, 졸업, 휴학, 
            $table->timestamps();
            //
        });

        Schema::create('employee_career', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->date('entrance_date')->nullable();
            $table->date('resignation_date')->nullable();
            $table->string('company_name')->nullable();
            $table->string('department')->nullable();
            $table->string('position')->nullable();
            $table->string('title')->nullable();
            $table->string('salary')->nullable();
            $table->string('description')->nullable();
            $table->string('resignation_reason')->nullable();
            $table->timestamps();
            //
        });

        Schema::create('employee_certificate', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name'); // name of certification
            $table->string('level')->nullable(); 
            $table->string('certified_by'); // name of issuing institution
            $table->date('acquired_at')->nullable(); 
            $table->date('expired_at')->nullable();

            $table->timestamps();
            //
        });

        Schema::create('employee_military', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('class'); //병역필 미필 면제
            $table->date('entrance_date')->nullable();
            $table->date('discharged_at')->nullable();
            $table->string('group'); // 육군, 공군, 해군, 
            $table->string('rank')->nullable(); // 계급
            $table->string('serial_no')->nullable(); //군번
            $table->string('status')->nullable(); // 현역, 예비역
			$table->string('reason')->nullable(); // 면제사유, 전역사유
			$table->string('file_location');
            $table->timestamps();
            //
        });

        Schema::create('employee_phone', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('employee_id')->unsigned();
                $table->integer('phone_id');
        });    

        Schema::create('employee_family', function (Blueprint $table) {
		        $table->increments('id');
		        $table->integer('relation')->unsigned();
		        $table->integer('name');
		        $table->string('dob');
		        $table->string('job'); // required for health insurance
		        $table->boolean('dependant'); //피부양자 여부
		        $table->string('file_location');
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
        Schema::drop('employees');
        Schema::drop('employee_levelofacademic');
        Schema::drop('employee_career');
        Schema::drop('employee_certificate');
        Schema::drop('employee_military');
        Schema::drop('employee_military');
        Schema::drop('employee_phone');
        Schema::drop('employee_family');
    }
}
