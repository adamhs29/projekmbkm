@extends('layouts.success')

@section('title')
    Store Success Page
@endsection

@section('content')
    <div class="page-content page-success">
      <div class="section-success" data-aos="zoom-in">
        <div class="container">
          <div class="row align-items-center row-login justify-content-center">
            <div class="col-lg-6 text-center">
              <img src="/images/success.svg" alt="" class="mb-4" />
              <h2>
                Pendaftaran Berhasil
              </h2>
              <p>
                Kamu sudah berhasil terdaftar. <br />
                Silahkan masuk ke halaman dashboard anda
              </p>
              <div>
                <a href="/dashboard" class="btn btn-success w-50 mt-4">
                  Ke Dashboard Saya
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection