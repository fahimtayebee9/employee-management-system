<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(
            [
                'menu_active' => 'departments',
                'page_title' => 'Departments',
                'page_title_description' => 'Manage Departments & Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Departments' => route('departments.index'),
                ],
            ]
        );

        $departments = Department::all();
        return view('admin.settings.department', compact('departments'));
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
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        $validated_data = Validator::make($request->all(), $request->rules(), $request->messages())->validate();

        if($validated_data){
            $department = Department::create($validated_data);
            return redirect()->back()->with('success', 'Department created successfully');
        }
        
        return redirect()->back()->with('error', 'Department creation failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $validated_data = Validator::make($request->all(), $request->rules(), $request->messages())->validate();

        if($validated_data){
            $department->update($validated_data);
            return redirect()->back()->with('success', 'Department updated successfully');
        }
        
        return redirect()->back()->with('error', 'Department updation failed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        $department = Department::find($id->id);
        $department->delete();
        return response()->json(['success' => 'Department deleted successfully', 'status' => 200]);
    }
}
