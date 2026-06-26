<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // DIUBAH: Dari 'pages.admin-dashboard' menjadi 'admin.dashboard'
        return view('admin.dashboard');
    }
}