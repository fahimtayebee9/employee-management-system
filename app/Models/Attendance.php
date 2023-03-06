<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date',
        'in_time',
        'out_time',
        'status',
        'note',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function getLaunchSheet(){
        return $this->belongsTo(LaunchSheet::class, 'attendance_id', 'id'); 
    }
}
