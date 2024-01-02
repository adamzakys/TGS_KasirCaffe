<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    function index(){
        return view('admin');
    }
    function owner(){
        return view('dashboard.dashboardowner');
    }
    function kasir(){
        return view('dashboard.dashboardkasir');
    }
}
