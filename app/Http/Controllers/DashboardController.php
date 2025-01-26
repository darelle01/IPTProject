<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function ShowDashboard()
    {        
    return view('AdminPages.RHUDashboard');
    }
}

