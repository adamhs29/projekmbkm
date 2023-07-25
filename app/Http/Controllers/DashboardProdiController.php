<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardProdiController extends Controller
{
    public function index()
    {
        return view('pages.dashboardprodi');
    }
}
