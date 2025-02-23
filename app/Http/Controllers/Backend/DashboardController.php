<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /** 
     * Displays the dashboard for the user.
    */
    public function index()
    {
        return view('admin.dashboard.index');
        
    }//End Method 
}
