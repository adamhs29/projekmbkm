<?php

namespace App\Http\Controllers;

use App\Models\pendaftar;
use Illuminate\Http\Request;

class DatapendaftarpengurusController extends Controller
{
    public function data_pendaftarpengurus()
    {
        $pendaftar = pendaftar::whereIn('status', ['3', '4', '5'])->get();

        return view('pages.data_pendaftar',compact('pendaftar'));
    }
}
