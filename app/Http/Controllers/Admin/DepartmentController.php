<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
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
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
                'status' => 'nullable',
            ], [
                'name.required' => 'Department name is required',
                'name.string' => 'Department name must be a string',
                'name.max' => 'Department name must not be greater than 255 characters',
                'description.string' => 'Department description must be a string',
                'description.max' => 'Department description must not be greater than 255 characters',
                'status.required' => 'Department status is required',
            ]);

            if($validated_data->fails()){
                dd($validated_data->errors(), $validated_data->messages(), $validated_data->failed());
                return redirect()->back()->withErrors($validated_data->errors());
            }

            $department                 = new Department();
            $department->name           = $request->name;
            $department->description    = $request->description;
            $department->status         = $request->status;
            $department->slug           = Str::slug($request->name);
            $department->save();
            
            return redirect()->back()->with('success', 'Department created successfully');
        }
        
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
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());

            if($validated_data->fails()){
                $department->name           = $request->name;
                $department->description    = $request->description;
                $department->status         = $request->status;
                $department->slug           = Str::slug($request->name);
                $department->update();
                return redirect()->back()->with(['success' => 'Department updated successfully', 'status' => 200]);
            }
            
            return redirect()->back()->with(['error' => 'Department not Updated', 'status' => 404]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $has_data = Department::find($id)->employees()->exists();
            
            if($has_data){
                return response()->json(['error' => 'Department has employees', 'status' => 400]);
            }
            else{
                $department = Department::find($id);
                $department->delete();
                return response()->json(['success' => 'Department deleted successfully', 'status' => 200]);
            }
        }
    }
}
