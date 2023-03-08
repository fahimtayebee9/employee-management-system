<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Holiday;
use App\Models\CompanyPolicy;
use App\Http\Requests\StoreHolidayRequest;
use App\Http\Requests\UpdateHolidayRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HolidayController extends Controller
{
    public function index()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session(
                [
                    'menu_active' => 'holidays',
                    'page_title' => 'Holidays',
                    'page_title_description' => 'Manage Holidays & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Holidays' => route('holidays.index'),
                    ],
                ]
            );

            $holidays_list = Holiday::all();
            $weekly_holiday = CompanyPolicy::first()->weekly_holiday;
            // dd($weekly_holiday);
            return view('admin.holidays.index',compact('holidays_list'));
        }
    }

    public function store(StoreHolidayRequest $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validator = Validator::make($request->all(), $request->rules(), $request->messages());

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $holiday = new Holiday();
            $holiday->name = $request->name;
            $holiday->date = $request->date;
            $holiday->is_weekend = ($request->input('is_weekend')) ? 1 : 0;
            $holiday->description = $request->description;
            $holiday->save();
            return redirect()->route('holidays.index');
        }
    }

    public function update(UpdateHolidayRequest $request, Holiday $holiday)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validator = Validator::make($request->all(), $request->rules, $request->messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $holiday = new Holiday();
            $holiday->name = $request->name;
            $holiday->date = $request->date;
            $holiday->description = $request->description;
            $holiday->save();
            return redirect()->route('admin.holidays.index');
        }
    }

    public function destroy(Holiday $holiday)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $holiday_obj = Holiday::find($holiday);

            if ($holiday_obj) {
                $holiday_obj->delete();
                return redirect()->route('admin.holidays.index');
            } else {
                return redirect()->route('admin.holidays.index')->with('error', 'The holiday does not exist.');
            }
        }
    }
}
