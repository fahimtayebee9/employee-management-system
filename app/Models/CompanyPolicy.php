<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPolicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'late_attendance_rule',
        'half_day_absent_rule',
        'half_day_absent_rule_value',
        'half_day_absent_rule_value_type',
        'full_day_absent_rule',
        'full_day_absent_rule_value',
        'full_day_absent_rule_value_type',
        'paid_leave_rule',
        'unpaid_leave_rule',
        'office_start_time',
        'office_end_time',
        'attendance_buffer_time',
        'attendance_bonus_rule',
        'attendance_bonus_rule_value',
        'attendance_bonus_rule_value_type',
        'overtime_rule',
        'overtime_rule_value',
        'overtime_rule_value_type',
        'launch_wastage_rule',
        'launch_wastage_rule_value',
        'yearly_paid_leaves',
        'festival_bonus_rule',
        'festival_bonus_rule_value',
        'festival_bonus_rule_value_type',
        'weekly_holiday',
        'status',
    ];
}
