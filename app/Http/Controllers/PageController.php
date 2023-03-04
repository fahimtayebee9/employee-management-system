<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CompanyPolicy;
use App\Models\LaunchSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\Employee;
use App\Models\TaskForm;
use App\Models\TaskSubmission;
use Carbon\Carbon;
use Illuminate\Support\Str;
    
class PageController extends Controller
{
    public function empDashboard(){
        session(
            [
                "page" => "dashboard",
                "page_title" => "Dashboard",
                "page_icon" => "fas fa-calendar-check",
            ]
        );
        return view('employee.dashboard');
    }

    public function empAttendance(){
        session(
            [
                "page" => "attendance",
                "page_title" => "Attendance",
                "page_icon" => "fas fa-calendar-check",
            ]
        );
        $attendanceList = Attendance::where('employee_id', 6)->get();
        return view('employee.pages.attendance', compact('attendanceList'));
    }

    public function empLaunchManagement(){
        session(
            [
                "page" => "launch-management",
                "page_title" => "Launch Management",
                "page_icon" => "fas fa-rocket",
            ]
        );
        return view('employee.pages.launchSheet');
    }

    public function empLaunchManagementStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'date' => 'required',
            'employee_id' => 'required',
        ]);

        $launchInfo = new LaunchSheet();
        $launchInfo->employee_id = $request->employee_id;
        $launchInfo->date = $request->date;
        $launchInfo->status = $request->launch_status;
        
        $launchInfo->save();
    }

    public function empLeaveIndex(){
        session(
            [
                "page" => "leave-management",
                "page_title" => "Leave Management",
                "page_icon" => "fas fa-calendar-check",
            ]
        );
        return view('employee.pages.leaves-index');
    }

    public function empAttendanceStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'date' => 'required',
            'employee_id' => 'required',
            'in_time' => 'required',
            'out_time' => 'required',
        ]);
        $companyPolicy = CompanyPolicy::first();
        dd(Carbon::parse($companyPolicy->office_start_time)->addMinutes($companyPolicy->attendance_buffer_time));

        if($validated_data->fails()){
            return redirect()->back()->withErrors([
                'error' => $validated_data->errors()->all(),
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            ]);
        }
        else{
            $attendance = new Attendance();
            $attendance->employee_id    = $request->employee_id;
            $attendance->date           = $request->date;
            $attendance->in_time        = date('Y-m-d H:i:s');
            if($request->in_time > Carbon::parse($companyPolicy->office_start_time)->addMinutes($companyPolicy->attendance_buffer_time)){
                $attendance->status = 5;
            }
            // check if out_time is less than office end time 
            // check if in_time is less than out_time
            $attendance->status         = 1;
            $attendance->save();
            $attendance->save();

            return redirect()->back()->with('success', 'Attendance added successfully');
        }
    }

    // EMPLOYEE TASK MANAGEMENT
    public function empTaskManagementShow(){
        session(
            [
                "page" => "task-management",
                "page_title" => "Task Management",
                "page_icon" => "fas fa-tasks",
            ]
        );
        return view('employee.pages.task-index');
    }

    public function empTaskManagementCreate(){
        session(
            [
                "page" => "task-management",
                "page_title" => "Task Management",
                "page_icon" => "fas fa-tasks",
            ]
        );
        $employee_id = 8;
        $employee = Employee::find($employee_id);
        $taskForm = TaskForm::where('designation_id', Employee::find($employee_id)->designation->id)->get()->first();

        if(!empty($taskForm)){
            return view('employee.pages.task-create', compact('taskForm', 'employee'));
        }
        
        return redirect()->back()->with(
            [
                'message' => 'No Task Form Found',
                'type' => 'error'
            ]
        );
    }

    public function empTaskManagementStore(Request $request){
        $request->validate([
            'employee_id' => 'required',
            'task_form_id' => 'required',
        ]);

        $taskSubmission = new TaskSubmission();
        $taskSubmission->employee_id    = $request->employee_id;
        $taskSubmission->task_form_id   = $request->task_form_id;
        $taskSubmission->field_1        = $request->field_1;
        $taskSubmission->field_2        = $request->field_2;
        $taskSubmission->field_3        = $request->field_3;
        $taskSubmission->field_4        = $request->field_4;
        $taskSubmission->field_5        = $request->field_5;
        $taskSubmission->field_6        = $request->field_6;
        $taskSubmission->field_7        = $request->field_7;
        $taskSubmission->field_8        = $request->field_8;
        $taskSubmission->field_9        = $request->field_9;
        $taskSubmission->field_10       = $request->field_10;
        $taskSubmission->field_11       = $request->field_11;
        $taskSubmission->field_12       = $request->field_12;
        $taskSubmission->field_13       = $request->field_13;
        $taskSubmission->field_14       = $request->field_14;
        $taskSubmission->field_15       = $request->field_15;
        $taskSubmission->save();
        
        return redirect()->route('employee.dashboard')->with([
            'message' => 'Task Form Created Successfully',
            'alert-type' => 'success'
        ]);
    }
    

}
