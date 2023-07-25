<?php

namespace App\Http\Controllers;

use App\Models\pendaftar;
use Illuminate\Http\Request;

class DatapendaftarprodiController extends Controller
{
    public function data_pendaftarprodi()
    {
        $pendaftar = pendaftar::all();
        return view('pages.data_pendaftar_diprodi',compact('pendaftar'));
    }
}
