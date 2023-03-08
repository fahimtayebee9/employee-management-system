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
use App\Models\ExtraLaunch;
use Carbon\Carbon;

class LaunchSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'launch_sheet',
                'page_title' => 'Launch Sheet',
                'page_title_description' => 'Manage Launch Sheet Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Launch Sheet' => route('admin.launch-sheet.index'),
                ],
            ]);

            $curDate = intval(date('d'));
            $curMonth = intval(date('m'));
            $curYear = intval(date('Y'));
            $launchSheets = LaunchSheet::all();

            $extraLaunchs = ExtraLaunch::all();


            for($i = 1; $i <= $curDate; $i++){
                // create new extra launch if not exist for each date
                $ext_launch = null;
                foreach($extraLaunchs as $extraLaunch){
                    if($extraLaunch->date == date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$i))){
                        $ext_launch = $extraLaunch;
                    }
                }
                // $extraLaunch = $extraLaunchs->whereDate('date', date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$i)))->first();
                // dd($ext_launch);
                $totalLaunchPerDay = LaunchSheet::whereDate('date', date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$i)))->where('status', 1)->get()->count();
                // dd($extraLaunch, $totalLaunchPerDay);
                if(isset($ext_launch) && $ext_launch != null){
                    $extraLaunchData = ExtraLaunch::whereDate('date', date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$i)))->get()->first();
                    // dd($extraLaunchData, $extraLaunch, $totalLaunchPerDay);
                    $extraLaunchData->count = $extraLaunch;
                    $extraLaunchData->total_launch = $totalLaunchPerDay;
                    $extraLaunchData->update();
                }
                else{
                    $dailyLaunchInfo = new ExtraLaunch();
                    $dailyLaunchInfo->date = date('Y-m-d', strtotime($curYear.'-'.$curMonth.'-'.$i));
                    $dailyLaunchInfo->total_launch = $totalLaunchPerDay;
                    $dailyLaunchInfo->count = 0;
                    $dailyLaunchInfo->save();
                }
                
            }
            $extraLaunchs = ExtraLaunch::all();
            $employees = Employee::all();
            return view('admin.launch-sheet.index', compact('launchSheets', 'employees', 'extraLaunchs'));
        }
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
