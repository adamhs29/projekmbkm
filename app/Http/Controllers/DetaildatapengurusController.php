<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class DetaildatapengurusController extends Controller
{
    public function detail_datapengurus($id_pendaftar)
    {
        $pendaftar = Pendaftar::find($id_pendaftar);
        $foto = substr($pendaftar->foto, 12);
        $krs = substr($pendaftar->krs, 11);
        $skrip_nilai = substr($pendaftar->skrip_nilai, 19);
        // dd($krs);

        return view('pages.detail_datapengurus', compact('pendaftar', 'foto', 'krs', 'skrip_nilai'));
    }

    public function updateStatus(Request $request)
    {
        
        $pendaftarId = $request->input('pendaftar_id');
        $pendaftar = Pendaftar::findOrFail($pendaftarId);

        if($request->input('validasipengurus')){
            $data = [
            'status'=> '4'
            ];
            Pendaftar::where('id_pendaftar',$pendaftarId)
                        ->update($data);
                return redirect('/data_pendaftarpengurus');
                }else{
            $data = [
            'status'=> '5'
            ];
            Pendaftar::where('id_pendaftar',$pendaftarId)
                        ->update($data);
                return redirect('/data_pendaftarpengurus');
        
        }
    }
}