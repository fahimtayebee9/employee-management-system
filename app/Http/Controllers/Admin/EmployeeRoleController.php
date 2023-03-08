<?php

namespace App\Http\Controllers\Admin;

use App\Models\EmployeeRole;
use App\Http\Requests\StoreEmployeeRoleRequest;
use App\Http\Requests\UpdateEmployeeRoleRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class EmployeeRoleController extends Controller
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
            session(
                [
                    'menu_active' => 'designations',
                    'page_title' => 'Designations',
                    'page_title_description' => 'Manage Designations & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Designations' => route('designations.index'),
                    ],
                ]
            );

            $employeeRoles = EmployeeRole::all();
            return view('admin.employees.emp-roles', compact('employeeRoles'));
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
     * @param  \App\Http\Requests\StoreEmployeeRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRoleRequest $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());

            if ($validated_data->fails()) {
                return redirect()->back()->withErrors($validated_data->errors());
            }

            $employeeRole = new EmployeeRole();
            $employeeRole->name = $request->name;
            $employeeRole->description = $request->description;
            $employeeRole->status = $request->status;
            $employeeRole->slug = Str::slug($request->name);
            $employeeRole->save();

            return redirect()->back()->with('success', 'Employee Role created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeRole  $employeeRole
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeRole $employeeRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeRole  $employeeRole
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeRole $employeeRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRoleRequest  $request
     * @param  \App\Models\EmployeeRole  $employeeRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRoleRequest $request, $employeeRole)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());
            $employeeRole = EmployeeRole::find($employeeRole);

            if ($validated_data->fails()) {
                return redirect()->back()->withErrors($validated_data->errors());
            }
            else if (!$employeeRole) {
                return redirect()->back()->withErrors('Employee Role not found');
            }

            $employeeRole->name = $request->name;
            $employeeRole->description = $request->description;
            $employeeRole->status = $request->status;
            $employeeRole->slug = Str::slug($request->name);
            $employeeRole->update();

            return redirect()->back()->with('success', 'Employee Role updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeRole  $employeeRole
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeeRole)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $employeeRole = EmployeeRole::find($employeeRole);

            if (!$employeeRole) {
                return redirect()->back()->withErrors('Employee Role not found');
            }
            else if ($employeeRole->employees()->count() > 0) {
                return redirect()->back()->withErrors('Employee Role cannot be deleted because it is assigned to one or more employees');
            }

            $employeeRole->delete();

            return redirect()->back()->with('success', 'Employee Role deleted successfully');
        }
    }
}
