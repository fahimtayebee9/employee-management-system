<?php

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\RoleManager;
use App\Models\PermissionManager;
use App\Models\EmployeeRole;
use App\Models\Department;
use App\Models\User;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Image;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = RoleManager::all();
        $permissions = PermissionManager::all();
        $employeeRoles = EmployeeRole::all();
        $departments = Department::all();
        $users = User::all();
        return view('admin.employees.create', compact('roles', 'permissions', 'employeeRoles', 'departments', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $item = Employee::find($employee->id);

        $roles = RoleManager::all();
        $permissions = PermissionManager::all();
        $employeeRoles = EmployeeRole::all();
        $departments = Department::all();
        $users = User::all();

        if(!empty($item)){
            return view('admin.employees.edit', compact('item', 'roles', 'permissions', 'employeeRoles', 'departments', 'users'));
        }
        else{
            return redirect()->route('admin.employees.index')->with([
                'message' => 'Employee not found',
                'alert-type' => 'error',
                'status' => 404
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee)
    {
        dd($request->all());
        
        // get employee
        $item = Employee::find($employee);

        dd($item);

        $validated_data = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
        ]);

        if ($validated_data->fails()) {
            return redirect()->back()
                ->withErrors($validated_data)
                ->withInput();
        }
        else if(!empty($item)){
            // user data of employee
            $user = User::find($item->user_id);
            $name_array         = explode(' ', $request->name);
            $user->first_name   = (count($name_array) > 2) ? implode(' ', array_slice($name_array, 0, -1)) : $request->name;
            $user->last_name    = $name_array[count($name_array) - 1];
            $user->username     = (!empty($last_username)) ? $last_username + 1 : $request->username;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->role_id      = $request->role_id;
            $user->blood_group  = $request->blood_group;
            $user->password     = bcrypt($request->password);
            $user->cspwdbycrt   = Crypt::encryptString($request->password);

            if ($request->hasFile('image')) {
                // delete old image
                if ($user->image != 'default.png' && $user->image != '') {
                    $old_image = public_path('storage/uploads/users/' . $user->image);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                }

                $file = $request->file('image');
                $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('storage/uploads/users/' . $filename);
                Image::make($file)->save($location);
                $user->image = $filename;
            }

            $user->update();

            $employee->employee_id      = $user->username;
            $employee->department_id    = $request->department_id;
            $employee->designation_id   = $request->designation_id;
            $employee->team_lead_id     = $request->team_lead_id;
            $employee->monthly_salary   = $request->monthly_salary;
            $employee->awards_won       = $request->awards_won;
            $employee->joining_date     = $request->joining_date;
            $employee->update();
    
            return redirect()->route('admin.employees.index')->with([
                'message' => 'Employee updated successfully',
                'alert-type' => 'success',
                'status' => 200
            ]);
        }
        else{
            return redirect()->route('admin.employees.index')->with([
                'message' => 'Employee not found',
                'alert-type' => 'error',
                'status' => 404
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        // check if employee exists in other tables
        
        // delete employee
        $item = Employee::find($employee);
        if(!empty($item)){
            // delete employee user_id from users table
            $user = User::find($item->user_id);
            $user->delete();
            $item->delete();
            return redirect()->route('admin.employees.index')->with([
                'message' => 'Employee deleted successfully',
                'alert-type' => 'success',
                'status' => 200
            ]);
        }
        else{
            return redirect()->route('admin.employees.index')->with([
                'message' => 'Employee not found',
                'alert-type' => 'error',
                'status' => 404
            ]);
        }
    }
}
