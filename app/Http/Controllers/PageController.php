<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CompanyPolicy;
use App\Models\LaunchSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\TaskForm;
use App\Models\TaskSubmission;
use App\Models\AttendanceBreak;
use App\Models\LeaveApplication;
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
        $attendanceList = Attendance::where('employee_id', 6)->orderby('id','desc')->get();
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
        $launchList = LaunchSheet::where('employee_id', 8)->orderby('id','desc')->get();
        return view('employee.pages.launchSheet', compact('launchList'));
    }

    public function empLaunchManagementStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'employee_id' => 'required',
            'launch_status' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors([
                'error' => $validated_data->errors()->all(),
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            ]);
        }

        $launchInfo = new LaunchSheet();
        $launchInfo->employee_id = $request->employee_id;
        $launchInfo->attendance_id = $request->attendance_id;
        $launchInfo->date = Carbon::now();
        $launchInfo->status = $request->launch_status;
        $launchInfo->save();

        return redirect()->back()->with([
            'message' => 'Launch Request submitted successfully',
            'alert-type' => 'success'
        ]);
    }

    public function empAttendanceGetAll($employee_id){
        $attendanceList = Attendance::where('employee_id', $employee_id)->get();
        return response()->json($attendanceList);
    }

    public function empLeaveIndex(){
        session(
            [
                "page" => "leave-management",
                "page_title" => "Leave Management",
                "page_icon" => "fas fa-calendar-check",
            ]
        );
        $leaveApplicationList = LeaveApplication::where('employee_id', 8)->get();
        return view('employee.pages.leaves-index', compact('leaveApplicationList'));
    }

    public function empLeaveStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'employee_id' => 'required',
            'leave_type' => 'required',
            'subject' => 'required',
            'leave_from' => 'required',
            'leave_to' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors([
                'error' => $validated_data->errors()->all(),
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            ]);
        }

        $leaveApplication = new LeaveApplication();
        $leaveApplication->employee_id = $request->employee_id;
        $leaveApplication->leave_type = $request->leave_type;
        $leaveApplication->subject = $request->subject;
        $leaveApplication->leave_from = $request->leave_from;
        $leaveApplication->leave_to = $request->leave_to;
        $leaveApplication->description = $request->description;
        $leaveApplication->save();

        return redirect()->back()->with([
            'message' => 'Leave Application submitted successfully',
            'alert-type' => 'success'
        ]);
    }

    public function empLeaveGetByType($type){
        $leaveApplicationList = LeaveApplication::where('employee_id', 8)->where('leave_type', $type)->get();
        return response()->json($leaveApplicationList);
    }

    public function empAttendanceStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'employee_id' => 'required',
        ]);

        $companyPolicy = CompanyPolicy::first();
        // dd(Carbon::parse($companyPolicy->office_start_time)->addMinutes($companyPolicy->attendance_buffer_time));

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
            $attendance->date           = date('Y-m-d');
            $attendance->in_time        = Carbon::now();
            if($request->in_time > Carbon::parse($companyPolicy->office_start_time)->addMinutes($companyPolicy->attendance_buffer_time)){
                $attendance->status = 6;
            }
            else{
                $attendance->status = 1;
            }
            $attendance->save();

            return redirect()->back()->with([
                'message' => 'Attendance marked successfully',
                'alert-type' => 'success'
            ]);
        }
    }

    public function empAttendanceUpdate(Request $request){
        $validated_data = Validator::make($request->all(), [
            'employee_id' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors([
                'error' => $validated_data->errors()->all(),
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            ]);
        }
        else{
            $attendance = Attendance::where('employee_id', $request->employee_id)->where('date', $request->date)->first();
            
            $attendance->out_time       = Carbon::now();
            $attendance->update();

            return redirect()->back()->with([
                'message' => 'Punched Out successfully',
                'alert-type' => 'success'
            ]);
        }
    }
    
    public function empAttendanceBreakStore(Request $request){
        $validated_data = Validator::make($request->all(), [
            'attendance_id' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors([
                'error' => $validated_data->errors()->all(),
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            ]);
        }
        else{
            $attendanceBreak = new AttendanceBreak();
            $attendanceBreak->attendance_id = $request->attendance_id;
            $attendanceBreak->break_in = Carbon::now();
            $attendanceBreak->save();

            return redirect()->back()->with([
                'message' => 'Break Started successfully',
                'alert-type' => 'success'
            ]);
        }
    }

    public function empAttendanceBreakUpdate(Request $request){
        $validated_data = Validator::make($request->all(), [
            'break_id' => 'required',
        ]);

        if($validated_data->fails()){
            return redirect()->back()->withErrors([
                'error' => $validated_data->errors()->all(),
                'message' => 'Please fill all the fields',
                'alert-type' => 'error'
            ]);
        }
        else{
            $attendanceBreak = AttendanceBreak::find($request->break_id);
            $attendanceBreak->break_out = Carbon::now();
            $attendanceBreak->update();

            return redirect()->back()->with([
                'message' => 'Break Ended successfully',
                'alert-type' => 'success'
            ]);
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
    

    public function empAttendanceGetByStatus($status){
        $employee_id = 8;
        $attendance = Attendance::where('employee_id', 8)->where('status', $status)->get();
        return response()->json($attendance);
    }

    public function empAttendanceGetLaunchSheet($atnId){
        $launch_status = LaunchSheet::where('attendance_id', $atnId)->get()->first()->status;
        return response()->json(["launch_status" => $launch_status]);
    }

    public function empAttendanceGetByMonth($month){
        $employee_id = 8;
        $attendance = Attendance::where('employee_id', 8)->whereMonth('date', $month)->get();
        return response()->json($attendance);
    }

}
