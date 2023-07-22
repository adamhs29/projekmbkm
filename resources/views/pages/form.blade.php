@extends('layouts.dashboard')

@section('title')
    Store Dashboard
@endsection

@section('content')
<!-- Section Content -->

@php
    $pendaftar = \App\Models\Pendaftar::where('user_id', auth()->user()->id)->first();
@endphp

<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
    <div class="dashboard-heading">
    <h2 class="dashboard-title">FORM PENDAFTARAN</h2>
    <p class="dashboard-subtitle">
        Isilah data dibawah ini dengan sebenar benarnya!
    </p>
    </div>
    <div class="dashboard-content">

   @if ($status === null )
    <form action="/form/store" method="POST"
        enctype="multipart/form-data">
            @csrf
            <span class="font-weight-bold mt-3 text-danger">Formulir Wajib Di Isi Semua*</span>
                <p class="font-weight-bold mt-3 bg-info ">A. Data Calon Peserta</p>
                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="">Nama</label>                        
                        {{-- <input name="nama" type="text" class="form-control" id="nama" placeholder="isi nama anda"> --}}
                        <input type="text" name="nama"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                placeholder="isi nama anda" value="{{ old('nama') }}">
                                            @error('nama')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                    </div>

                     <div class="form-group col-md-6">
                        <label for="">NPM</label>
                            <input type="number" name="npm"
                                class="form-control @error('npm') is-invalid @enderror" id=""
                                placeholder="isi NPM anda" value="{{ old('npm') }}">
                                    @error('npm')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="">NIK</label>
                            <input type="number" name="nik"
                                class="form-control @error('nik') is-invalid @enderror" id=""
                                placeholder="isi NIK anda" value="{{ old('nik') }}">
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                    </div> 

<div class="form-group col-md-6">
    <label for="">Jenis Kelamin</label>
    <div class="custom-control custom-radio">
        <input type="radio" id="customRadio1" name="jenis_kelamin"
            class="custom-control-input" value="Laki-Laki" required
            @if(old('jenis_kelamin') == 'Laki-Laki') checked @endif>
        <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="customRadio2" name="jenis_kelamin"
            class="custom-control-input" value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan')
            checked @endif>
        <label class="custom-control-label" for="customRadio2">Perempuan</label>
    </div>
</div>


                    <div class="form-group col-md-12">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            id="">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                    </div>

                                                        
                                        <div class="form-group col-md-4">
                                            <label for="">Kecamatan</label>
                                            <input type="text" name="kecamatan"
                                                class="form-control @error('kecamatan') is-invalid @enderror" id=""
                                                placeholder="kecamatan" value="{{ old('kecamatan') }}">
                                            @error('kecamatan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Kabupaten</label>
                                            <input type="text" name="kabupaten"
                                                class="form-control @error('kabupaten') is-invalid @enderror" id=""
                                                placeholder="kabupaten" value="{{ old('kabupaten') }}">
                                            @error('kabupaten')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">provinsi</label>
                                            <input type="text" name="provinsi"
                                                class="form-control @error('provinsi') is-invalid @enderror" id=""
                                                placeholder="provinsi" value="{{ old('provinsi') }}">
                                            @error('provinsi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror"
                                                id="inputCity" placeholder="Tempat Lahir"
                                                value="{{ old('tempat_lahir') }}">
                                            @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                                id="inputCity" value="{{ old('tanggal_lahir') }}">
                                            @error('tanggal_lahir')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="">No Telpon Anda</label>
                                            <input type="number" name="no_telp"
                                                class="form-control @error('no_telp') is-invalid @enderror"
                                                placeholder="08123456789" id="inputCity" value="{{ old('no_telp') }}">
                                            @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div> 

                                        <div class="form-group col-md-4">
                                            <label for="">Fakultas</label>
                                            <select
                                                class="form-control select2bs4 @error('fakultas_id') is-invalid @enderror"
                                                style="width: 100%;" name="fakultas_id">
                                                <option selected="selected" disabled>Pilih Fakultas</option>
                                                @foreach($fakultass as $fakultas)
                                                <option value="{{ $fakultas->id_fakultas }}">{{ $fakultas->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('fakultas_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    <div class="form-group col-md-4">
                                            <label for="">Prodi</label>
                                            <select
                                                class="form-control select2bs4 @error('prodi_id') is-invalid @enderror"
                                                style="width: 100%;" name="prodi_id">
                                                <option selected="selected" disabled>Pilih Prodi</option>

                                                @foreach($prodis as $prodi)
                                                <option value="{{ $prodi->id_prodi }}">{{ $prodi->nama }}</option>
                                                @endforeach

                                            </select>
                                            @error('prodi_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    <div class="form-group col-md-4">
                                            <label for="">Program MBKM</label>
                                            <select
                                                class="form-control select2bs4 @error('program_id') is-invalid @enderror"
                                                style="width: 100%;" name="program_id">
                                                <option selected="selected" disabled>Pilih Program MBKM</option>
                                                    @foreach($programs as $program)
                                                    <option value="{{ $program->id_program }}">{{ $program->nama }}</option>
                                                    @endforeach

                                            </select>
                                            @error('program_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                    {{-- <div class="form-group col-md-3">
                                            <label for="">Input Mata Kuliah</label>
                                            <select
                                                class="form-control select2bs4 @error('program_id') is-invalid @enderror"
                                                style="width: 100%;" name="program_id">
                                                <option selected="selected" disabled>Pilih Mata Kuliah</option>
                                                    @foreach($programs as $program)
                                                    <option value="{{ $program->id_program }}">{{ $program->nama }}</option>
                                                    @endforeach

                                            </select>
                                            @error('program_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div> --}}

                                         <div class="form-group col-md-4">
                                            <label for="foto">Foto 4 x 6</label>
                                            <input type="file" name="foto" accept=".jpg, .jpeg, .png"
                                                class="form-control-file @error('foto') is-invalid @enderror"
                                                id="foto">
                                            @error('foto')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                         <div class="form-group col-md-4">
                                            <label for="skrip_nilai">Skrip Nilai</label>
                                            <input type="file" name="skrip_nilai" accept=".pdf"
                                                class="form-control-file @error('skrip_nilai') is-invalid @enderror"
                                                id="skrip_nilai">
                                            @error('skrip_nilai')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="krs">KRS</label>
                                            <input type="file" name="krs" accept=".pdf"
                                                class="form-control-file @error('krs') is-invalid @enderror"
                                                id="krs">
                                            @error('krs')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

<div class="form-group col-md-6">
    <label for="ipk">IPK</label>    
    <input type="text" name="ipk" class="form-control @error('ipk') is-invalid @enderror"
        placeholder="isi IPK anda" value="{{ old('ipk') }}" inputmode="decimal" pattern="[0-9]+([.,][0-9]+)?">
        <small class="text-muted">Contoh: 3.14</small>
    @error('ipk')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

                     <div class="form-group col-md-6">
                        <label for="">Semester</label>
                            <input type="number" name="semester"
                                class="form-control @error('semester') is-invalid @enderror" id=""
                                placeholder="saat ini anda berada di semester berapa?" value="{{ old('semester') }}">
                                <small class="text-muted">Masukkan angkanya saja, contoh: 6</small>
                                    @error('semester')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                    </div>

                                    </div>    

                                                                         <p class="font-weight-bold mt-3 bg-info ">B. Input Mata Kuliah</p>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Nama Ayah</label>
                                            <input type="text" name="nama_ayah"
                                                class="form-control @error('nama_ayah') is-invalid @enderror" id=""
                                                placeholder="Nama Ayah" value="{{ old('nama_ayah') }}">
                                            @error('nama_ayah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nama Ibu</label>
                                            <input type="text" name="nama_ibu"
                                                class="form-control @error('nama_ibu') is-invalid @enderror" id=""
                                                placeholder="Nama Ibu" value="{{ old('nama_ibu') }}">
                                            @error('nama_ibu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Alamat Orang Tua</label>
                                        <textarea name="alamat_ortu"
                                            class="form-control @error('alamat_ortu') is-invalid @enderror">{{ old('alamat_ortu') }}</textarea>
                                        @error('alamat_ortu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">No Telepon Orang Tua</label>
                                            <input type="number" name="no_telp_ortu"
                                                class="form-control @error('no_telp_ortu') is-invalid @enderror" id=""
                                                placeholder="08123456789" value="{{ old('no_telp_ortu') }}">
                                            @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Pekerjaan Ayah</label>
                                            <input type="text" name="pekerjaan_ayah"
                                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id=""
                                                placeholder="Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}">
                                            @error('pekerjaan_ayah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu"
                                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id=""
                                                placeholder="Pekerjaan Ibu" value="{{ old('pekerjaan_ibu') }}">
                                            @error('pekerjaan_ibu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> 
                                    
                                     <p class="font-weight-bold mt-3 bg-info ">C. Data Orang Tua</p>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Nama Ayah</label>
                                            <input type="text" name="nama_ayah"
                                                class="form-control @error('nama_ayah') is-invalid @enderror" id=""
                                                placeholder="Nama Ayah" value="{{ old('nama_ayah') }}">
                                            @error('nama_ayah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nama Ibu</label>
                                            <input type="text" name="nama_ibu"
                                                class="form-control @error('nama_ibu') is-invalid @enderror" id=""
                                                placeholder="Nama Ibu" value="{{ old('nama_ibu') }}">
                                            @error('nama_ibu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Alamat Orang Tua</label>
                                        <textarea name="alamat_ortu"
                                            class="form-control @error('alamat_ortu') is-invalid @enderror">{{ old('alamat_ortu') }}</textarea>
                                        @error('alamat_ortu')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">No Telepon Orang Tua</label>
                                            <input type="number" name="no_telp_ortu"
                                                class="form-control @error('no_telp_ortu') is-invalid @enderror" id=""
                                                placeholder="08123456789" value="{{ old('no_telp_ortu') }}">
                                            @error('no_telp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>

                                            <div class="form-group col-md-4">
                                            <label for="">Pekerjaan Ayah</label>
                                            <input type="text" name="pekerjaan_ayah"
                                                class="form-control @error('pekerjaan_ayah') is-invalid @enderror" id=""
                                                placeholder="Pekerjaan Ayah" value="{{ old('pekerjaan_ayah') }}">
                                            @error('pekerjaan_ayah')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu"
                                                class="form-control @error('pekerjaan_ibu') is-invalid @enderror" id=""
                                                placeholder="Pekerjaan Ibu" value="{{ old('pekerjaan_ibu') }}">
                                            @error('pekerjaan_ibu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div> 

                                    <div style="margin-top: 10px; margin-bottom: 30px;">
                                        <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                                    </div>
                                    </form>

                                @elseif ($status == 1 || $status == 2 || $status == 3 || $status == 4)
                                <a href="{{ route('pengumuman') }}" class="btn btn-info">Lihat Pengumuman</a>
                                @endif

</div>
</div>
@endsection
