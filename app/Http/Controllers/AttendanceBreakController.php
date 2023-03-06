<?php

namespace App\Http\Controllers;

use App\Models\AttendanceBreak;
use App\Http\Requests\StoreAttendanceBreakRequest;
use App\Http\Requests\UpdateAttendanceBreakRequest;

class AttendanceBreakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAttendanceBreakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendanceBreakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceBreak  $attendanceBreak
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceBreak $attendanceBreak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceBreak  $attendanceBreak
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceBreak $attendanceBreak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendanceBreakRequest  $request
     * @param  \App\Models\AttendanceBreak  $attendanceBreak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendanceBreakRequest $request, AttendanceBreak $attendanceBreak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceBreak  $attendanceBreak
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceBreak $attendanceBreak)
    {
        //
    }
}
