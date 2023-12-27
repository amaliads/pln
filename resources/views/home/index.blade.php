@extends('layouts.master')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

<style>
  .larger-text {
    font-size: 17px; /* Adjust the size as needed */
    font-weight: bold;
  }
</style>

@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <!-- Konten untuk bagian atas -->
                <div class="d-flex align-items-end row">
                    <!-- Konten pada sisi kiri -->
                    <div class="col-sm-7">
                        <div class="card-body">
                            <!-- Teks sambutan -->
                            @if(Auth::check())
                                <h4 class="card-title text-primary">Selamat Datang, {{ Auth::user()->name }}!👋🏻</h4>
                            @endif
                            <p class="mb-1 larger-text"><strong>Selamat Datang di Aplikasi Sistem Pendataan Barang (SIDABAR)</strong></p>
                            <p class="mb-1"><strong>PT. PLN UNIT INDUK DISTRIBUSI (UID) JAWA TENGAH & D.I. YOGYAKARTA</strong></p>
                            @if(Auth::check())
                            <a href="/myprofil" class="btn btn-sm btn-outline-primary">My Profil</a>
                            @else
                            @endif
                        </div>
                    </div>
                    <!-- Konten pada sisi kanan -->
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-5" style="height: 90%;">
                            <!-- Gambar placeholder -->
                            <img src="{{ asset('template/assets/img/illustrations/sitting-girl-with-laptop-dark.png') }}"
                                height="150" alt="MY PROFIL"
                                data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png"
                                data-app-light-img="illustrations/sitting-girl-with-laptop-dark.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Konten untuk keempat card -->
        <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow card-border-shadow-warning h-100" style="box-shadow: 20 10 10px rgba(6, 100, 255, 0.5);">
                <!-- Isi Card 1 -->
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-dock-bottom"></i></span>
                        </div>
                        <!-- Tambahkan konten sesuai kebutuhan -->
                        <h3 class="ms-1 mb-0 fw-bold">{{ $data_mitra }}</h3>
                    </div>
                    <!-- Tambahkan konten lainnya -->
                    <p class="mb-2">Total Data Penerimaan Barang dari Mitra</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1"></span>
                        @if(Auth::user() && Auth::user()->role == 'adminn')
                        <a href="{{ route('data_mitra.index') }}" class="text">View details</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <!-- Konten untuk keempat card -->
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow card-border-shadow-primary h-100">
                <!-- Isi Card 1 -->
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-cabinet"></i></span>
                        </div>
                        <!-- Tambahkan konten sesuai kebutuhan -->
                        <h3 class="ms-1 mb-0 fw-bold">{{ $data_mitrapengembalian }}</h3>
                    </div>
                    <!-- Tambahkan konten lainnya -->
                    <p class="mb-2">Total Data Pengembalian Barang Mitra</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1"></span>
                        @if(Auth::user() && Auth::user()->role == 'adminn')
                        <a href="{{ route('data_mitrapengembalian.index') }}" class="text">View details</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow card-border-shadow-success h-100">
                <!-- Isi Card 1 -->
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-devices"></i></span>
                        </div>
                        <!-- Tambahkan konten sesuai kebutuhan -->
                        <h3 class="ms-1 mb-0 fw-bold">{{ $data_penerimas }}</h3>
                    </div>
                    <!-- Tambahkan konten lainnya -->
                    <p class="mb-2">Total Data Pegawai Penerima Barang</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1"></span>
                        <a href="{{route('data_penerimas.index')}}" class="text">View details</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow card-border-shadow-primary h-100">
                <!-- Isi Card 1 -->
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                            <span class="avatar-initial rounded bg-label-danger"><i class="bx bx-laptop"></i></span>
                        </div>
                        <!-- Tambahkan konten sesuai kebutuhan -->
                        <h3 class="ms-1 mb-0 fw-bold">{{ $data_pengembalian }}</h3>
                    </div>
                    <!-- Tambahkan konten lainnya -->
                    <p class="mb-2">Total Data Pengembalian Barang Pegawai</p>
                    <p class="mb-0">
                        <span class="fw-medium me-1"></span>
                        <a href="{{ route('data_pengembalian.index') }}" class="text">View details</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Card 2 -->
        <!-- Card 3 -->
        <!-- Card 4 -->
    </div>

    <div class="row">
        <!-- Konten lainnya sesuai kebutuhan -->
    </div>

    <div class="row">
        <!-- Konten lainnya sesuai kebutuhan -->
    </div>

    <div class="row">
        <!-- Konten lainnya sesuai kebutuhan -->
    </div>
@endsection
<style>
    /* CSS di sini hanya sebagai contoh */
    /* Ganti warna tautan setelah diklik */
    a.text-muted:visited {
        color: purple; /* Ubah warna menjadi ungu setelah diklik */
    }
</style>
