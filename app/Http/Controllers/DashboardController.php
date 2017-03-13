<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    //

    public function index(Request $r)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        
        return 'Dashboard';
    }
}
