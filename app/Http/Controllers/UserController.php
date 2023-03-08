<?php

namespace App\Http\Controllers;

use App\Models\RoleManager;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Intervention\Image\Facades\Image;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
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
            return view('admin.administration.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
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

            // get last user id
            $last_username = User::orderBy('id', 'desc')->first()->username;
            
            $user               = new User();
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
                $file = $request->file('image');
                $filename = 'img_' . time() . '.' . $file->getClientOriginalExtension();
                $location = public_path('storage/uploads/users/' . $filename);
                Image::make($file)->save($location);
                $user->image = $filename;
            }

            $user->save();

            // create employee record if role is not super admnin
            if ($request->role_id != RoleManager::where('name', 'Super Admin')->first()->id) {
                $employee                   = new Employee();
                $employee->user_id          = $user->id;
                $employee->employee_id      = $user->username;
                $employee->department_id    = $request->department_id;
                $employee->designation_id   = $request->designation_id;
                $employee->team_lead_id     = $request->team_lead_id;
                $employee->monthly_salary   = $request->monthly_salary;
                $employee->awards_won       = $request->awards_won;
                $employee->joining_date     = $request->joining_date;
                $employee->save();

                // add employee id to attendance table
                $attendance = new Attendance();
                $attendance->employee_id = $employee->id;
                $attendance->save();

                return redirect()->route('administration.index')->with([
                    'success' => 'User has been created with employee details successfully.',
                    'type' => 'success',
                ]);
            }

            return redirect()->back()->with([
                'success' => 'User has been created successfully.',
                'type' => 'success',
            ]);
        }
    }

    // public function to get the username
    public function getUserName(Request $request)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $username = User::orderBy('id', 'desc')->first()->username;
            return response()->json(['username' => $username, 'status' => 200, 'message' => 'success']);
        }
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
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $userInfo = User::find($id);

            if($userInfo->role_id != RoleManager::where('name', 'Super Admin')->first()->id){
                $employeeInfo = Employee::where('user_id', $id)->first();
                return view('admin.administration.edit', compact('userInfo', 'employeeInfo'));
            }

            return view('admin.administration.edit', compact('userInfo'));
        }
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
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $validated_data = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
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

                // create employee record if role is not super admnin
                if ($request->role_id != RoleManager::where('name', 'Super Admin')->first()->id) {
                    $employee                   = new Employee();
                    $employee->user_id          = $user->id;
                    $employee->employee_id      = $user->username;
                    $employee->department_id    = $request->department_id;
                    $employee->designation_id   = $request->designation_id;
                    $employee->team_lead_id     = $request->team_lead_id;
                    $employee->monthly_salary   = $request->monthly_salary;
                    $employee->awards_won       = $request->awards_won;
                    $employee->joining_date     = $request->joining_date;
                    $employee->update();

                    return redirect()->route('administration.index')->with([
                        'success' => 'User has been created with employee details successfully.',
                        'type' => 'success',
                    ]);
                }
        
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            $user = User::find($id);

            $tables = DB::select('SHOW TABLES');
            $tableNames = array_map(function($table) {
                return $table->Tables_in_database_name;
            }, $tables);

            foreach ($tableNames as $table) {
                $tabledata = DB::table($table)->where('user_id', $id)->first();
                if(!empty($tabledata)){
                    return redirect()->route('administration.index')->with([
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
                return redirect()->route('administration.index')->with([
                    'success' => 'User has been deleted successfully.',
                    'type' => 'success',
                ]);
            }
            else{
                return redirect()->route('administration.index')->with([
                    'success' => 'User not found.',
                    'type' => 'danger',
                ]);
            }
        }
    }
}
