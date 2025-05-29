<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function welcomePage()
    {
        return view('welcome');
    }
    public function dashboardPage()
    {
        // $user = auth()->user();
        // $users = User::orderBy('id' , 'desc')->get();
        return view('dashboard');
    }

}
