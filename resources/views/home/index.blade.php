@extends('layouts.master')

@section('title')
<style>
    .rounded-image {
        width: 100%;
        height: auto;
        border-radius: 20px; /* You can adjust this value to control the roundness */
        overflow: hidden;
    }
</style>

<img src="{{ asset('template/assets/img/landingpage.png') }}" alt="landingpage" class="rounded-image">
<br> 
<br>
<div class="row row-cols-1 row-cols-md-4 g-4">
  <div class="col mb-3">
    <div class="card h-100">
      <img class="card-img-top" src="{{ asset('template/assets/img/datamitra.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <a href="{{ route('data_pengembalian.index') }}" class="card-link">
          <h5 class="card-title">Data Barang Masuk Dari Mitra</h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-100">
      <img class="card-img-top" src="{{ asset('template/assets/img/kembalimitra.jpg')}}" alt="Card image cap" />
      <div class="card-body"> 
        <a href="{{ route('data_arsip.index') }}" class="card-link">
          <br>
          <h5 class="card-title">Data Pengembalian Barang Ke-Mitra </h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-100">
      <img class="card-img-top" src="{{ asset('template/assets/img/terimapegawai.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <a href="{{ route('data_arsip.index') }}" class="card-link">
          <h5 class="card-title">Data Pegawai Penerima Barang</h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-100">
      <img class="card-img-top" src="{{ asset('template/assets/img/kembalipegawai.jpg')}}" alt="Card image cap" />
      <div class="card-body">
        <a href="{{ route('data_arsip.index') }}" class="card-link">
          <br>
          <h5 class="card-title">Data Pengembalian Barang Pegawai</h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-100">
    <a href="{{ route('data_arsip.index') }}" class="card-link">
      <img class="card-img-top" src="{{ asset('template/assets/img/suratBA.jpg')}}" alt="Card image cap" />
      <div class="card-body text-center">
          <h5 class="card-title fw-bold">Data Surat Berita Acara</h5>
        </a>
      </div>
    </div>
  </div>

  <!-- Repeat the above structure for additional cards -->
</div>

@endsection