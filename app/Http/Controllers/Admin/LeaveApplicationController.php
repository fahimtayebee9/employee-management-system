<?php

namespace App\Http\Controllers\Admin;

use App\Models\LeaveApplication;
use App\Http\Requests\StoreLeaveApplicationRequest;
use App\Http\Requests\UpdateLeaveApplicationRequest;
use App\Http\Controllers\Controller;

class LeaveApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session([
            'menu_active' => 'leave-applications',
            'page_title' => 'Leave Applications',
            'page_title_description' => 'Overview of the system',
            'breadcrumb' => [
                'Home' => route('admin.dashboard'),
                'Leave Applications' => '',
            ],
        ]);

        $leaveApplicationsList = LeaveApplication::all();
        return view('admin.leave-applications.index', compact('leaveApplicationsList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLeaveApplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeaveApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApplication $leaveApplication)
    {
        $leaveApplication = LeaveApplication::find($leaveApplication->id);

        if(!empty($leaveApplication)) {
            return view('admin.leave.show', compact('leaveApplication'));
        }

        return redirect()->route('admin.leave.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApplication $leaveApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLeaveApplicationRequest  $request
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLeaveApplicationRequest $request, LeaveApplication $leaveApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveApplication  $leaveApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApplication $leaveApplication)
    {
        //
    }
}
