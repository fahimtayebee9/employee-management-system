<?php

namespace App\Http\Controllers;

use App\Models\RoleManager;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Image;

class UserController extends Controller
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
                'menu_active' => 'administrative_users',
                'page_title' => 'Administrative Users',
                'page_title_description' => 'Manage Administrative Users & Details',
                'breadcrumb' => [
                    'Home' => route('admin.dashboard'),
                    'Administrative Users' => route('administration.index'),
                ],
            ]
        );

        $users = User::where('role_id', '!=', RoleManager::where('name', 'Employee')->first()->id)->get();
        return view('admin.administration.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated_data = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        if ($validated_data->fails()) {
            return redirect()->back()
                ->withErrors($validated_data)
                ->withInput();
        }
        
        $user               = new User();
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->role_id      = $request->role_id;
        $user->blood_group  = $request->blood_group;
        $user->password     = bcrypt($request->password);
        $user->cspwdbycrt   = Crypt::encryptString($request->password);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
            $location = public_path('storage/uploads/users/' . $filename);
            Image::make($file)->save($location);
            $user->image = $filename;
        }

        $user->save();

        return redirect()->back()->with([
            'success' => 'User has been created successfully.',
            'type' => 'success',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        try {
                $decrypted = Crypt::decrypt($encrypted);
            } catch (DecryptException $e) {
                $e->getMessage();
                info("Error....!!");
            }
        
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated_data = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
        ]);

        $user = User::find($id);

        if ($validated_data->fails()) {
            return redirect()->back()
                ->withErrors($validated_data)
                ->withInput();
        }
        else if(!empty($user)){
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->phone        = $request->phone;
            $user->role_id      = $request->role_id;
            $user->blood_group  = $request->blood_group;
            $user->password     = bcrypt($request->password);
            $user->cspwdbycrt   = Crypt::encryptString($request->password);
    
            if ($request->hasFile('image')) {
                if(!empty($user->image) && file_exists(public_path('storage/uploads/users/' . $user->image))){
                    unlink(public_path('storage/uploads/users/' . $user->image));
                }
                $file = $request->file('image');
                $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('storage/uploads/users/' . $filename);
                Image::make($file)->save($location);
                $user->image = $filename;
            }
    
            $user->update();
    
            return redirect()->back()->with([
                'success' => 'User has been Updated successfully.',
                'type' => 'success',
            ]);
        }
        else{
            return redirect()->back()->with([
                'success' => 'User not found.',
                'type' => 'danger',
            ]);
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $tables = DB::select('SHOW TABLES');
        $tableNames = array_map(function($table) {
            return $table->Tables_in_database_name;
        }, $tables);

        foreach ($tableNames as $table) {
            $tabledata = DB::table($table)->where('user_id', $id)->first();
            if(!empty($tabledata)){
                return redirect()->back()->with([
                    'success' => 'User has been used in other table.',
                    'type' => 'danger',
                ]);
            }
        }

        if(!empty($user)){
            if(!empty($user->image) && file_exists(public_path('storage/uploads/users/' . $user->image))){
                unlink(public_path('storage/uploads/users/' . $user->image));
            }
            $user->delete();
            return redirect()->back()->with([
                'success' => 'User has been deleted successfully.',
                'type' => 'success',
            ]);
        }
        else{
            return redirect()->back()->with([
                'success' => 'User not found.',
                'type' => 'danger',
            ]);
        }
    }
}
