<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class DetaildataprodiController extends Controller
{
    public function detail_dataprodi($id_pendaftar)
    {
        $pendaftar = Pendaftar::find($id_pendaftar);
        $foto = substr($pendaftar->foto, 12);
        $krs = substr($pendaftar->krs, 11);
        $skrip_nilai = substr($pendaftar->skrip_nilai, 19);
        // dd($krs);

        return view('pages.detail_dataprodi', compact('pendaftar', 'foto', 'krs', 'skrip_nilai'));
    }

    public function updateStatus(Request $request)
    {
        
        $pendaftarId = $request->input('pendaftar_id');
        $pendaftar = Pendaftar::findOrFail($pendaftarId);

        if($request->input('validasi')){
            $data = [
            'status'=> '3'
            ];
            Pendaftar::where('id_pendaftar',$pendaftarId)
                        ->update($data);
                return redirect('/data_pendaftarprodi');
                }else{
            $data = [
            'status'=> '2'
            ];
            Pendaftar::where('id_pendaftar',$pendaftarId)
                        ->update($data);
                return redirect('/data_pendaftarprodi');
        
        }
    }
}
