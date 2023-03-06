<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSubmission extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->belongsTo(Employee::class , 'employee_id' , 'id');
    }

    public function taskForm()
    {
        return $this->belongsTo(TaskForm::class , 'task_form_id' , 'id');
    }
}
