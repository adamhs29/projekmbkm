@extends('layouts.dashboard-pengurus')

@section('title', 'Detail Data Pendaftar')

@section('content')
<style>
    .button-container {
        display: flex;
        justify-content: space-between;
    }

    .left-button {
        order: 1;
    }

    .right-buttons {
        order: 2;
    }
</style>

<div class="card">
    <div class="card-body pt-3">

            <h5 class="card-title">Detail Data Pendaftar</h5>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Foto</div>
                    <div class="col-lg-9 col-md-8">
                        <img src="{{ url('storage/foto/').'/'.$foto}}" alt="" width="200">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->nama }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Npm</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->npm }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Nik</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->nik }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Jenis Kelamin</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->jenis_kelamin }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Alamat</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->alamat }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Kecamatan</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->kecamatan }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Kabupaten</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->kabupaten }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Provinsi</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->provinsi }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Tempat Lahir</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->tempat_lahir }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Tanggal Lahir</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->no_telp }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Fakultas</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->fakultas->nama }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Prodi</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->prodi->nama }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Program MBKM Yang Dipilih</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->program->nama }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">Skrip Nilai</div>
                    <div class="col-lg-9 col-md-8">
                        <a href="{{ url('storage/skrip_nilai/').'/'.$skrip_nilai }}" target="_blank">Lihat Skrip Nilai</a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label">KRS</div>
                    <div class="col-lg-9 col-md-8">
                        <a href="{{ url('storage/krs/').'/'.$krs }}" target="_blank">Lihat Krs</a>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">IPK</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->ipk }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Nama Ayah</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->nama_ayah }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Nama Ibu</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->nama_ibu }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Alamat Orang Tua</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->alamat_ortu }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">No Telepon Orang Tua</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->no_telp_ortu }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Pekerjaan Ayah</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->pekerjaan_ayah }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-lg-3 col-md-4 label ">Pekerjaan Ibu</div>
                    <div class="col-lg-9 col-md-8">{{ $pendaftar->pekerjaan_ibu }}</div>
                </div>

                <div class="button-container">
                    <a href="{{ url()->previous() }}" class="btn btn-primary left-button">Kembali</a>
                
                    <div class="right-buttons">
                        <form method="POST" action="{{ route('validasipengurus',['id_pendaftar'=>$pendaftar->id_pendaftar]) }}">
                            @method('put')
                            @csrf
                            <input type="hidden" name="pendaftar_id" value="{{ $pendaftar->id_pendaftar }}">
                            <input type="submit" name="validasipengurus" class="btn btn-primary" value="Validasi Data">
                            <input type="submit" name="tolak" class="btn btn-primary" value="Tolak Pendaftar">
                        </form>
                    </div>
                </div>
                
                {{-- <div style="display: flex; justify-content: space-between;">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                    <div>
                      <a class="btn btn-primary">Validasi Data</a>
                      <a class="btn btn-primary">Tolak Pendaftar</a>
                    </div>
                  </div> --}}
            </div>
        </div>
@endsection
{{-- <table>
        <tr>
            <th>Nama</th>
            <td>{{ $pendaftar->nama }}</td>
        </tr>
        <tr>
            <th>NPM</th>
            <td>{{ $pendaftar->npm }}</td>
        </tr>
        <tr>
            <th>Nik</th>
            <td>{{ $pendaftar->nik }}</td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td>{{ $pendaftar->jenis_kelamin }}</td>
        </tr>
        <!-- Add more details as needed -->
    </table> --}}