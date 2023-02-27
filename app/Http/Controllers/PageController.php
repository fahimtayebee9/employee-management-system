<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CompanyPolicy;
use Illuminate\Http\Request;

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
        $request->validate([
            'date' => 'required',
            'in_time' => 'required',
            'out_time' => 'required',
        ]);

        $attendance                 = new Attendance();
        $attendance->employee_id    = 6;
        $attendance->date           = $request->date;
        $attendance->in_time        = $request->in_time;
        $attendance->out_time       = $request->out_time;
        // check if in_time is greater than office_start_time and office_start_time from CompanyPolicy
        $companyPolicy = CompanyPolicy::first();
        dd($companyPolicy->office_start_time + $companyPolicy->attendance_buffer_time);

        if($request->in_time > $companyPolicy->office_start_time + $companyPolicy->attendance_buffer_time){
            $attendance->status = 5;
        }
        // check if out_time is less than office end time 
        // check if in_time is less than out_time
        $attendance->status         = 
        $attendance->save();

        return redirect()->back()->with('success', 'Attendance added successfully');
    }
}
