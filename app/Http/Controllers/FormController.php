<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Pendaftar;
use App\Models\Matkul;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;


class FormController extends Controller
{
    public function index()
    {
        $programs = Program::all();
        $prodis = Prodi::all();
        $fakultas = Fakultas::all();
        $matkuls = Matkul::all();
        $user_id = Auth::id();
        $pendaftar = Pendaftar::where('user_id', $user_id)->first();
        $status = $pendaftar ? $pendaftar->status : null;

        return view('pages.form', [
            'programs' => $programs,
            'prodis' => $prodis,
            'fakultass' => $fakultas,
            'matkuls' => $matkuls,
            'status' => $status,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'npm' => 'required|max:50',
            'nik' => 'required|max:50',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_telp' => 'required|max:50',
            'fakultas_id' => 'required|exists:fakultas,id_fakultas',
            'prodi_id' => 'required|exists:prodi,id_prodi',
            'program_id' => 'required|exists:program,id_program',            
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'skrip_nilai' => 'required|mimes:pdf',
            'krs' => 'required|mimes:pdf',
            'ipk' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'semester' => 'required',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'alamat_ortu' => 'required',
            'no_telp_ortu' => 'required|max:50',
            'pekerjaan_ayah' => 'required',
            'pekerjaan_ibu' => 'required',

            
            'angkatan' => 'required',
            'matkul.*' => 'required',

        ], [
            'nama' => 'Nama anda belum di isi',
            'npm' => 'NPM anda belum di isi',
            'nik' => 'NIK anda belum di isi',
            'jenis_kelamin' => 'Jenis kelamin anda belum di pilih',
            'alamat' => 'Alamat anda belum di isi',
            'kecamatan' => 'Kecamatan anda belum di isi',
            'kabupaten' => 'Kabupaten anda belum di isi',
            'provinsi' => 'Provinsi anda belum di isi',
            'tempat_lahir' => 'Tempat lahir anda belum di isi',
            'tanggal_lahir' => 'Tanggal lahir anda belum di isi',
            'no_telp' => 'Nomor telepon anda belum di isi',
            'fakultas_id' => 'Fakultas belum dipilih',            
            'prodi_id' => 'Prodi belum dipilih',
            'program_id' => 'Program belum dipilih',
            'foto' => 'Foto krs belum di upload',
            'foto.mimes' => 'Foto hanya diperbolehkan berekstensi JPEG, JPG, PNG, dan GIF',
            'skrip_nilai' => 'File skrip nilai belum di upload',
            'skrip_nilai.mimes' => 'skrip nilai hanya diperbolehkan berekstensi PDF',
            'krs' => 'File krs belum di upload',
            'krs.mimes' => 'KRS hanya diperbolehkan berekstensi PDF',
            'semester' => 'Semester anda belum di isi atau formatnya salah',
            'nama_ayah' => 'Nama Ayah anda belum di isi',
            'nama_ibu' => 'Nama Ibu anda belum di isi',
            'alamat_ortu' => 'Alamat Orang Tua anda belum di isi',
            'no_telp_ortu' => 'Nomor telepon Orang Tua anda belum di isi',
            'pekerjaan_ayah' => 'Pekerjaan Ayah anda belum di isi',
            'pekerjaan_ibu' => 'Pekerjaan Ibu anda belum di isi',   
            
            'angkatan' => 'Angaktan anda belum di isi atau formatnya salah',
            'matkul.*.required' => 'Pilih setidaknya satu mata kuliah',
            'matkul.*.exists' => 'Mata kuliah yang dipilih tidak valid',
        ]);

        $user_id = auth()->user()->id_user;

        // Periksa apakah pengguna sudah pernah mendaftar
        $pendaftar = Pendaftar::where('user_id', $user_id)->first();
        if ($pendaftar) {            
            return redirect()->back()->with('error', 'Anda sudah pernah mendaftar.');
        }

        // Proses penyimpanan data

        // Proses pengunggahan file foto
        if ($request->hasFile('foto')) {
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = $request->get('npm') . '.' . $foto_ekstensi;
            $fotoPath = $foto_file->storeAs('public/foto', $foto_nama);
        }

        // Proses pengunggahan file KRS
        if ($request->hasFile('krs')) {
            $krs_file = $request->file('krs');
            $krs_ekstensi = $krs_file->extension();
            $krs_nama = $request->get('npm') . '.' . $krs_ekstensi;
            $krsPath = $krs_file->storeAs('public/krs', $krs_nama);
        }

        // Proses pengunggahan file skrip nilai
        if ($request->hasFile('skrip_nilai')) {
            $skrip_nilai_file = $request->file('skrip_nilai');
            $skrip_nilai_ekstensi = $skrip_nilai_file->extension();
            $skrip_nilai_nama = $request->get('npm') . '.' . $skrip_nilai_ekstensi;
            $skrip_nilaiPath = $skrip_nilai_file->storeAs('public/skrip_nilai', $skrip_nilai_nama);
        }

    // Mendapatkan nilai dari input 'matkul'
    $selectedMatkuls = $request->input('matkul');

    // $matkuls = \App\Models\Matkul::all();
    // dd($matkuls);

    // Menyimpan nilai kode_matkul dan nama_matkul ke dalam tabel pendaftar
    if (!empty($selectedMatkuls)) {
    $kode_matkul = \App\Models\Matkul::whereIn('id_matkul', $selectedMatkuls)->pluck('kode_matkul')->toArray();
    $nama_matkul= \App\Models\Matkul::whereIn('id_matkul', $selectedMatkuls)->pluck('nama_matkul')->toArray();
    $totalSKS = array_sum(\App\Models\Matkul::whereIn('id_matkul', $selectedMatkuls)->pluck('jumlah_sks')->toArray());

    }

//     dd($kode_matkul);
// dd($nama_matkul);


    $totalSKS = 0;
if (!empty($selectedMatkuls)) {
        // Mengambil data SKS berdasarkan id_matkul yang dipilih
        $selectedSks = \App\Models\Matkul::whereIn('id_matkul', $selectedMatkuls)->pluck('jumlah_sks')->toArray();

        // Jumlahkan nilai SKS yang dipilih
        $totalSKS = array_sum($selectedSks);
    }

    session(['totalSKS' => $totalSKS]);


// Mendapatkan data kode_matkul dan nama_matkul dari database berdasarkan $selectedMatkuls
$kodeMatkulArray = [];
$namaMatkulArray = [];
if (!empty($selectedMatkuls)) {
    foreach ($selectedMatkuls as $matkulId) {
        $matkul = \App\Models\Matkul::find($matkulId);
        if ($matkul) {
            $kodeMatkulArray[] = $matkul->kode_matkul;
            $namaMatkulArray[] = $matkul->nama_matkul;
        }
    }
}

// Menggabungkan kode_matkul menjadi array JSON
$kode_matkul = empty($kodeMatkulArray) ? [] : json_encode($kodeMatkulArray);
// Menggabungkan nama_matkul menjadi array JSON
$nama_matkul = empty($namaMatkulArray) ? [] : json_encode($namaMatkulArray);


        // Simpan data ke database dengan status 1 (sudah mendaftar)
        $data = [
            'user_id' => $user_id,
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'nik' => $request->input('nik'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'alamat' => $request->input('alamat'),
            'kecamatan' => $request->input('kecamatan'),
            'kabupaten' => $request->input('kabupaten'),
            'provinsi' => $request->input('provinsi'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'no_telp' => $request->input('no_telp'),
            'fakultas_id' => $request->input('fakultas_id'),
            'prodi_id' => $request->input('prodi_id'),
            'program_id' => $request->input('program_id'),
            'foto' => $fotoPath ?? null,
            'skrip_nilai' => $skrip_nilaiPath ?? null,            
            'krs' => $krsPath ?? null,
            'semester' => $request->input('semester'),
            'nama_ayah' => $request->input('nama_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'alamat_ortu' => $request->input('alamat_ortu'),
            'no_telp_ortu' => $request->input('no_telp_ortu'),
            'pekerjaan_ayah' => $request->input('pekerjaan_ayah'),
            'pekerjaan_ibu' => $request->input('pekerjaan_ibu'),
            'status' => 0, // Status awal pendaftar (belum mendaftar)
            'total_sks' => $totalSKS,

            'angkatan' => $request->input('angkatan'),


        'kode_matkul' => $kode_matkul,
        'nama_matkul' => $nama_matkul,

        ];

        $pendaftar = Pendaftar::create($data);

        // Setelah menyimpan data, ubah nilai status menjadi 1
        $pendaftar->status = 1;
        $pendaftar->save();

        return redirect(route('form'))->with('sukses', 'Data berhasil di kirim, silahkan menggunggu pengumuman');
        // return redirect()->back()->with('success', 'Data pendaftar telah disimpan.');
    }

    public function pengumuman()
    {
        $user_id = auth()->user()->id_user;

        // Mengambil data pendaftar berdasarkan id_user
        $pendaftar = Pendaftar::where('user_id', $user_id)->get();

        return view('pages.pengumuman', [
            'pendaftar' => $pendaftar,
        ]);
    }

    public function cetaksuratrekomendasi()
{
    
$user_id = Auth::id();
$pendaftar = Pendaftar::where('user_id', $user_id)->first();

    if ($pendaftar && $pendaftar->user) {
        $pdf = PDF::loadView('layouts.surat_rekomendasi', compact('pendaftar'));
        return $pdf->download('surat_rekomendasi.pdf');
    }

    // Jika pendaftar tidak ditemukan atau tidak terkait dengan user, Anda dapat mengembalikan respons sesuai kebutuhan, misalnya:
    return response()->json(['message' => 'Pendaftar tidak ditemukan'], 404);
}

    public function cetaksptjm()
{
    
$user_id = Auth::id();
$pendaftar = Pendaftar::where('user_id', $user_id)->first();

    if ($pendaftar && $pendaftar->user) {
        $pdf = PDF::loadView('layouts.sptjm', compact('pendaftar'));
        return $pdf->download('sptjm.pdf');
    }

    // Jika pendaftar tidak ditemukan atau tidak terkait dengan user, Anda dapat mengembalikan respons sesuai kebutuhan, misalnya:
    return response()->json(['message' => 'Pendaftar tidak ditemukan'], 404);
}

}
