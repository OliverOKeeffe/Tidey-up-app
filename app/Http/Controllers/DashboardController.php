<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();

        // Check if the user has the 'admin' role
        if($user->hasRole('admin')){
            return view('admin.dashboard');
        }
        else{
            return view('dashboard');
        }
    }
}