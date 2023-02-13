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
        Schema::create('company_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('late_attendance_rule')->nullable();
            $table->string('half_day_absent_rule')->nullable();
            $table->string('half_day_absent_rule_value')->nullable();
            $table->string('half_day_absent_rule_value_type')->nullable();
            $table->string('full_day_absent_rule')->nullable();
            $table->string('full_day_absent_rule_value')->nullable();
            $table->string('full_day_absent_rule_value_type')->nullable();
            $table->string('paid_leave_rule')->nullable();
            $table->string('unpaid_leave_rule')->nullable();
            $table->time('office_start_time')->nullable();
            $table->time('office_end_time')->nullable();
            $table->biginteger('attendance_buffer_time')->nullable();
            $table->string('attendance_bonus_rule')->nullable();
            $table->string('attendance_bonus_rule_value')->nullable();
            $table->string('attendance_bonus_rule_value_type')->nullable();
            $table->string('overtime_rule')->nullable();
            $table->string('overtime_rule_value')->nullable();
            $table->string('overtime_rule_value_type')->nullable();
            $table->string('launch_wastage_rule')->nullable();
            $table->string('launch_wastage_rule_value')->nullable();
            $table->string('yearly_paid_leaves')->nullable();
            $table->string('festival_bonus_rule')->nullable();
            $table->string('festival_bonus_rule_value')->nullable();
            $table->string('festival_bonus_rule_value_type')->nullable();
            $table->string('weekly_holiday')->nullable();
            $table->integer('status')->default(1)->comment('1=active, 0=inactive');
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
        Schema::dropIfExists('company_policies');
    }
};
