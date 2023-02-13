<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_managers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('role_id');
            $table->integer('employee_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('employee_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('employee_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('employee_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('attendance_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('attendance_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('attendance_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('attendance_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('holiday_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('holiday_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('holiday_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('holiday_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('company_policy_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('company_policy_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('company_policy_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('company_policy_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('launch_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('launch_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('launch_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('launch_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('leaves_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('leaves_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('leaves_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('leaves_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('departments_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('departments_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('departments_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('departments_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('accounts_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('accounts_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('accounts_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('accounts_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('payroll_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('payroll_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('payroll_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('payroll_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('report_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('report_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('report_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('report_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('task_management_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('task_management_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('task_management_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('task_management_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->integer('administration_read')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('administration_create')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('administration_update')->default(0)->comment('1 for Granted, 0 for Rejected');
            $table->integer('administration_delete')->default(0)->comment('1 for Granted, 0 for Rejected');
            
            $table->foreign('role_id')->references('id')->on('role_managers')->onDelete('cascade');
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
        Schema::dropIfExists('permission_managers');
    }
};
