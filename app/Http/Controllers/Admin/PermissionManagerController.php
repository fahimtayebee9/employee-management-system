<?php

namespace App\Http\Controllers\Admin;

use App\Models\PermissionManager;
use App\Http\Requests\StorePermissionManagerRequest;
use App\Http\Requests\UpdatePermissionManagerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\RoleManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionManagerController extends Controller
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
                    'menu_active' => 'permission_managers',
                    'page_title' => 'Administrative Permissions',
                    'page_title_description' => 'Manage Administrative Permissions & Details',
                    'breadcrumb' => [
                        'Home' => route('admin.dashboard'),
                        'Administrative Permissions' => route('permissions.index'),
                    ],
                ]
            );

            $permissions_list = PermissionManager::all();
            return view('admin.permissions.index', compact('permissions_list'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            return view('admin.permissions.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePermissionManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionManagerRequest $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages())->validate();

            if($validated_data) {
                $permission = PermissionManager::create($validated_data);
                $permission->save();

                return redirect()->route('permissions.index')->with('success', 'Permission has been added successfully');
            }

            return redirect()->route('permissions.index')->with('error', 'Permission has not been added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermissionManager  $permissionManager
     * @return \Illuminate\Http\Response
     */
    public function show(PermissionManager $permissionManager)
    {
        dd($permissionManager);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermissionManager  $permissionManager
     * @return \Illuminate\Http\Response
     */
    public function edit($permissionManager)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $permissionManager = PermissionManager::find($permissionManager);

            if($permissionManager) {
                $roles_list = RoleManager::all();
                return view('admin.permissions.edit', compact('permissionManager', 'roles_list'));
            }

            return redirect()->route('permissions.index')->with('error', 'Permission not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionManagerRequest  $request
     * @param  \App\Models\PermissionManager  $permissionManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionManagerRequest $request, $permissionManager)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), $request->rules(), $request->messages())->validate();

            if($validated_data) {
                $permissionManager = PermissionManager::find($permissionManager);
                $permissionManager->update($validated_data);

                return redirect()->route('permissions.index')->with('success', 'Permission has been updated successfully');
            }

            return redirect()->route('permissions.index')->with('error', 'Permission has not been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermissionManager  $permissionManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionManager $permissionManager)
    {
        //
    }
}
