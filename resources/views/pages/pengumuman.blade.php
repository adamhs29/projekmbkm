@extends('layouts.dashboard')

@section('title')
    Store Dashboard
@endsection

@section('content')
<!-- Section Content -->

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

            @if(count($pendaftar) > 0)
        @foreach($pendaftar as $data)
            <div>
                @if ($data->status == 1)
                    <p><h3>Menunggu validasi Prodi dan Pengurus</h3></p>
                @elseif ($data->status == 2)
                    <p><h3>Maaf tidak diterima</h3></p>
                @elseif ($data->status == 3)
                    <p><h3>Selamat anda sudah tervalidasi Prodi tetapi masih menunggu validasi dari Pengurus</h3><br>
                        Anda dapat mendownload surat Rekomendasi <br> <a href="{{ route('cetaksuratrekomendasi') }}" class="btn btn-primary"> Cetak Surat Rekomendasi</a> </p>
                @elseif ($data->status == 4)
                    <p><h3>Selamat anda sudah tervalidasi Prodi dan Pengurus</h3><br>
                        Anda dapat mendownload surat Rekomendasi <br> <a href="{{ route('cetaksuratrekomendasi') }}" class="btn btn-primary"> Cetak Surat Rekomendasi</a><br><br>
                        Anda dapat mendownload SPTJM <br> <a href="{{ route('cetaksptjm') }}" class="btn btn-primary"> Cetak SPTJM</a></p><br><br>
                @endif
            </div>
        @endforeach
    @else
        <p>Tidak ada data pendaftar yang tersedia.</p>
    @endif


</div>
</div>
@endsection