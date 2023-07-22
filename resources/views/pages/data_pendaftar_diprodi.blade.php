@extends('layouts.dashboard-prodi')

@section('title', 'Data Pendaftar')

@section('content')
<h5 class="card-title">Data Pendaftar</h5>
        
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>No</th> <!-- Numbering column -->
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php
                        $count = 1; // Initialize the counter variable
                    @endphp
                        @foreach($pendaftar as $item)
                            <tr>
                                <td>{{ $count++ }}</td> <!-- Increment and display the counter value -->
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->npm }}</td>
                                <td>@switch($item->status)
                                        @case(2)
                                            Ditolak Prodi
                                            @break
                                        @case(3)
                                            Tervalidasi Prodi
                                            @break
                                        @case(4)
                                            Tervalidasi Prodi dan Pengurus
                                            @break
                                        @case(5)
                                            Ditolak Pengurus
                                            @break
                                        @default
                                            Tidak Dikenal
                                    @endswitch</td></td>
                                <td>
                                    <!-- Tambahkan tombol atau link aksi sesuai kebutuhan Anda -->
                                    
                                    <a href="{{ route('admin_prodi.detail_dataprodi', ['id_pendaftar' => $item->id_pendaftar]) }}">View Details</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
            
@endsection
