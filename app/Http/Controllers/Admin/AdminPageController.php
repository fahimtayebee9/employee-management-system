<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function index()
    {
        if(Auth::check() == false){
            return redirect()->route('login');
        }
        else{
            session([
                'menu_active' => 'dashboard',
                'page_title' => 'Dashboard',
                'page_title_description' => 'Overview of the system',
                'breadcrumb' => [
                    'Home' => '',
                ],
            ]);
    
            return view('admin.dashboard');
        }
    }
}
