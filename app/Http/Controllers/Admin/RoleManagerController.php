<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleManager;
use App\Http\Requests\StoreRoleManagerRequest;
use App\Http\Requests\UpdateRoleManagerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class RoleManagerController extends Controller
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
                    'menu_active' => 'role_managers',
                    'page_title' => 'Administrative Roles',
                    'page_title_description' => 'Manage Administrative Roles & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Administrative Roles' => route('roles.index'),
                    ],
                ]
            );

            $roles_list = RoleManager::all();
            return view('admin.settings.role', compact('roles_list'));
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
     * @param  \App\Http\Requests\StoreRoleManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleManagerRequest $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages());

            if($validated_data->passes()){
                $roleManager = new RoleManager();
                $roleManager->name = $request->name;
                $roleManager->description = $request->description;
                $roleManager->status = $request->status;
                $roleManager->slug = Str::slug($request->name);
                $roleManager->save();

                return redirect()->back()->with('success', 'Administrative Role created successfully');
            }
            
            return redirect()->back()->with('error', 'Administrative Role creation failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleManager  $roleManager
     * @return \Illuminate\Http\Response
     */
    public function show(RoleManager $roleManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleManager  $roleManager
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleManager $roleManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleManagerRequest  $request
     * @param  \App\Models\RoleManager  $roleManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleManagerRequest $request, RoleManager $roleManager)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages())->validate();

            if($validated_data){
                $roleManager = RoleManager::find($roleManager->id);
                $roleManager->name = $request->name;
                $roleManager->description = $request->description;
                $roleManager->status = $request->status;
                $roleManager->slug = Str::slug($request->name);
                $roleManager->update();

                return redirect()->back()->with('success', 'Administrative Role updated successfully');
            }
            
            return redirect()->back()->with('error', 'Department updation failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleManager  $roleManager
     * @return \Illuminate\Http\Response
     */
    public function destroy($roleManager)
    {
        // check if the role is not the default role
        // if($roleManager != 1){
        //     $role = RoleManager::find($roleManager);

        //     // check if role is not assigned to any user
        //     if($role->users->count() > 0){
        //         return redirect()->back()->with('error', 'Administrative Role is assigned to some users. Please remove the role from the users first');
        //     }

        //     $role->delete();
        //     return redirect()->back()->with('success', 'Administrative Role deleted successfully');
        // }
    }
}
