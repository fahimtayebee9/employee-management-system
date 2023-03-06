<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function index()
    {
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
