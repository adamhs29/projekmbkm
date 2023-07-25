<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardPengurusController extends Controller
{
    public function index()
    {
        return view('pages.dashboardpengurus');
    }
}
