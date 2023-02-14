<?php

use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\CompanyPolicyController;
use App\Http\Controllers\Admin\CompanyDetailController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RoleManagerController;
use App\Http\Controllers\Admin\PermissionManagerController;
use App\Http\Controllers\Admin\EmployeeRoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// create route group for admin
Route::prefix("admin")->group(function(){
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
    
    Route::group(['prefix' => 'company-policy'], function () {
        Route::get('/', [CompanyPolicyController::class, 'index'])->name('company-policy.index');
        Route::post('/update', [CompanyPolicyController::class, 'update'])->name('company-policy.update');
        Route::get('/edit/{companyPolicy}', [CompanyPolicyController::class, 'edit'])->name('company-policy.edit');
    });

    Route::group(['prefix' => 'company-details'], function () {
        Route::post('/update', [CompanyPolicyController::class, 'update'])->name('company-details.update');
    });

    // Route group for departments
    Route::group(['prefix' => 'departments'], function () {
        Route::get('/', [DepartmentController::class, 'index'])->name('departments.index');
        Route::post('/store', [DepartmentController::class, 'store'])->name('departments.store');
        Route::post('/update/{roleManager}', [DepartmentController::class, 'update'])->name('departments.update');
        Route::get('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('departments.destroy');
    });

    // Administration routes
    Route::group(['prefix' => 'administration'], function () {
        Route::get('/users', [UserController::class, 'index'])->name('administration.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('administration.users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('administration.users.store');
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

     
});