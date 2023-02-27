<?php

use App\Http\Controllers\Admin\AttendanceController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\CompanyPolicyController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RoleManagerController;
use App\Http\Controllers\Admin\PermissionManagerController;
use App\Http\Controllers\Admin\EmployeeRoleController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Admin\LaunchSheetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// create route group for admin
Route::prefix("admin")->group(function () {
    Route::get('/', function () {
        return view('admin.layouts.app');
    })->name('admin.dashboard');

    Route::resource("holidays", HolidayController::class, [
        'names' => [
            'index' => 'holidays.index',
            'create' => 'holidays.create',
            'store' => 'holidays.store',
            'edit' => 'holidays.edit',
            'update' => 'holidays.update',
            'destroy' => 'holidays.destroy',
        ]
    ]);

    // Route group for departments
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::post('/update/{roleManager}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::get('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });

    Route::group(['prefix' => 'company-policy'], function () {
        Route::get('/', [CompanyPolicyController::class, 'index'])->name('company-policy.index');
        Route::post('/update', [CompanyPolicyController::class, 'update'])->name('company-policy.update');
        Route::get('/edit/{companyPolicy}', [CompanyPolicyController::class, 'edit'])->name('company-policy.edit');
    });

    Route::group(['prefix' => 'company-details'], function () {
        Route::post('/update/{companyDetail}', [CompanyDetailController::class, 'update'])->name('company-details.update');
    });



    // Administration routes
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/users', [UserController::class, 'index'])->name('administration.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('administration.users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('administration.users.store');
        Route::get('/users/lastUserName', [UserController::class, 'getUserName'])->name('admin.administration.findLastUsername');
        Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('administration.users.edit');
        Route::post('/users/update/{user}', [UserController::class, 'update'])->name('administration.users.update');
    });

    // Route group for Roles
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleManagerController::class, 'index'])->name('roles.index');
        Route::post('/store', [RoleManagerController::class, 'store'])->name('roles.store');
        Route::post('/update/{role}', [RoleManagerController::class, 'update'])->name('roles.update');
        Route::get('/destroy/{role}', [RoleManagerController::class, 'destroy'])->name('roles.destroy');
    });

    // Route group for Permissions
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', [PermissionManagerController::class, 'index'])->name('permissions.index');
        Route::get('/create', [PermissionManagerController::class, 'create'])->name('permissions.create');

        Route::post('/store', [PermissionManagerController::class, 'store'])->name('permissions.store');
        Route::post('/update/{permission}', [PermissionManagerController::class, 'update'])->name('permissions.update');
        Route::get('/destroy/{permission}', [PermissionManagerController::class, 'destroy'])->name('permissions.destroy');
        Route::get('/show/{permission}', [PermissionManagerController::class, 'show'])->name('permissions.show');
        Route::get('/edit/{permission}', [PermissionManagerController::class, 'edit'])->name('permissions.edit');
    });

    // routes for employee roles management
    Route::group(['prefix' => 'designations'], function () {
        Route::get('/', [EmployeeRoleController::class, 'index'])->name('designations.index');
        Route::post('/store', [EmployeeRoleController::class, 'store'])->name('designations.store');
        Route::post('/update/{employeeRole}', [EmployeeRoleController::class, 'update'])->name('designations.update');
        Route::get('/destroy/{employeeRole}', [EmployeeRoleController::class, 'destroy'])->name('designations.destroy');
    });

    // routes for employee management
    Route::group(['prefix' => 'employees'], function () {
        Route::get('/', [EmployeeController::class, 'index'])->name('admin.employees.index');
        Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/store', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/show/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
        Route::get('/edit/{employee}', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::post('/update/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
        Route::get('/destroy/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });

    // routes for attendance management
    Route::group(['prefix' => 'attendance'], function () {
        Route::get('/', [AttendanceController::class, 'index'])->name('admin.attendance.index');
        Route::get('/create', [AttendanceController::class, 'create'])->name('admin.attendance.create');
        Route::post('/store', [AttendanceController::class, 'store'])->name('admin.attendance.store');
        Route::get('/show/{attendance}', [AttendanceController::class, 'show'])->name('admin.attendance.show');
        Route::get('/edit/{attendance}', [AttendanceController::class, 'edit'])->name('admin.attendance.edit');
        Route::post('/update/{attendance}', [AttendanceController::class, 'update'])->name('admin.attendance.update');
        Route::get('/destroy/{attendance}', [AttendanceController::class, 'destroy'])->name('admin.attendance.destroy');
    });

    // routes for leave management
    Route::group(['prefix' => 'leave'], function () {
        Route::get('/', [LeaveController::class, 'index'])->name('admin.leave.index');
        Route::get('/create', [LeaveController::class, 'create'])->name('admin.leave.create');
        Route::post('/store', [LeaveController::class, 'store'])->name('admin.leave.store');
        Route::get('/show/{leave}', [LeaveController::class, 'show'])->name('admin.leave.show');
        Route::get('/edit/{leave}', [LeaveController::class, 'edit'])->name('admin.leave.edit');
        Route::post('/update/{leave}', [LeaveController::class, 'update'])->name('admin.leave.update');
        Route::get('/destroy/{leave}', [LeaveController::class, 'destroy'])->name('admin.leave.destroy');
    });

    Route::group(['prefix' => 'launch-sheet'], function(){
        Route::get('/', [LaunchSheetController::class, 'index'])->name('admin.launch-sheet.index');
        Route::get('/create', [LaunchSheetController::class, 'create'])->name('admin.launch-sheet.create');
        Route::post('/store', [LaunchSheetController::class, 'store'])->name('admin.launch-sheet.store');
        Route::get('/show/{launchSheet}', [LaunchSheetController::class, 'show'])->name('admin.launch-sheet.show');
        Route::get('/edit/{launchSheet}', [LaunchSheetController::class, 'edit'])->name('admin.launch-sheet.edit');
        Route::post('/update/{launchSheet}', [LaunchSheetController::class, 'update'])->name('admin.launch-sheet.update');
        Route::get('/destroy/{launchSheet}', [LaunchSheetController::class, 'destroy'])->name('admin.launch-sheet.destroy');
    });
});

Route::prefix('employee')->group(function(){
    Route::get('/dashboard', [PageController::class, 'empDashboard'])->name('employee.dashboard');

    Route::get('/profile', [PageController::class, 'empProfile'])->name('employee.profile');
    
    Route::get('/attendance', [PageController::class, 'empAttendance'])->name('employee.attendance');
    Route::post('/attendance/store', [PageController::class, 'empAttendanceStore'])->name('employee.attendance.store');

    Route::get('/launch-management', [PageController::class, 'empLaunchManagement'])->name('employee.launch-management');
    Route::post('/launch-management/store', [PageController::class, 'empLaunchManagementStore'])->name('employee.launch-management.store');
    Route::post('/attendance/update/{attendance}', [PageController::class, 'empAttendanceUpdate'])->name('employee.attendance.update');

    Route::get('/leave', [PageController::class, 'empLeaveIndex'])->name('employee.leave-management');
    Route::post('/leave/store', [PageController::class, 'empLeaveStore'])->name('employee.leave.store');
    Route::post('/leave/update/{leave}', [PageController::class, 'empLeaveUpdate'])->name('employee.leave.update');
    Route::get('/leave/destroy/{leave}', [PageController::class, 'empLeaveDestroy'])->name('employee.leave.destroy');

    Route::get('/task-management', [PageController::class, 'empTaskManagement'])->name('employee.task-management');
    Route::post('/task-management/store', [PageController::class, 'empTaskManagementStore'])->name('employee.task-management.store');
    Route::post('/task-management/update/{task}', [PageController::class, 'empTaskManagementUpdate'])->name('employee.task-management.update');
    Route::get('/task-management/destroy/{task}', [PageController::class, 'empTaskManagementDestroy'])->name('employee.task-management.destroy');
    
});
