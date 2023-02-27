<?php

namespace App\Http\Controllers\Admin;

use App\Models\LaunchSheet;
use App\Http\Requests\StoreLaunchSheetRequest;
use App\Http\Requests\UpdateLaunchSheetRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Employee;
use App\Models\EmployeeAttendance;

class LaunchSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session([
            'menu_active' => 'launch_sheet',
            'page_title' => 'Launch Sheet',
            'page_title_description' => 'Manage Launch Sheet Details',
            'breadcrumb' => [
                'Home' => route('admin.dashboard'),
                'Launch Sheet' => route('admin.launch-sheet.index'),
            ],
        ]);

        $launchSheets = LaunchSheet::all();
        $employees = Employee::all();
        return view('admin.launch-sheet.index', compact('launchSheets', 'employees'));
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
     * @param  \App\Http\Requests\StoreLaunchSheetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLaunchSheetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaunchSheet  $launchSheet
     * @return \Illuminate\Http\Response
     */
    public function show(LaunchSheet $launchSheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaunchSheet  $launchSheet
     * @return \Illuminate\Http\Response
     */
    public function edit(LaunchSheet $launchSheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaunchSheetRequest  $request
     * @param  \App\Models\LaunchSheet  $launchSheet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLaunchSheetRequest $request, LaunchSheet $launchSheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaunchSheet  $launchSheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaunchSheet $launchSheet)
    {
        //
    }
}
