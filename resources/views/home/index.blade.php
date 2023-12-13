@extends('layouts.master')

@section('title')
<style>
    .rounded-image {
        width: 100%;
        height: auto;
        border-radius: 20px; /* You can adjust this value to control the roundness */
        overflow: hidden;
    }

    .layout-without-navbar-light {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around; /* Adjust as needed */
    }

    .col {
        width: calc(20% - 1rem); /* Adjust the width and margin between columns */
        margin-right: 1rem;
        margin-bottom: 1rem;
    }

    .card {
        width: 11rem; /* Set fixed width for the card */
        height: 18rem; /* Set fixed height for the card */
        margin-bottom: 0.5rem; /* Adjust the margin between cards */
    }

    .card-img-top {
        width: 100%;
        height: 11rem; /* Adjust the image height as needed */
        object-fit: cover;
    }
    </style>

<img src="{{ asset('template/assets/img/home.png') }}" alt="landingpage" class="rounded-image">
<br> 
<br>
<div class="layout-without-navbar-light"> <!-- Adjust the gap between cards (g-2) -->
  <div class="col mb-3">
    <div class="card h-10">
      <img class="card-img-top" src="{{ asset('template/assets/img/datamitra.jpg')}}" alt="Card image cap" />
      <div class="card-body text-center">
        <a href="{{ route('data_pengembalian.index') }}" class="card-link">
          <h5 class="card-title fw-bold">Data Barang Masuk Dari Mitra</h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-10">
      <img class="card-img-top" src="{{ asset('template/assets/img/kembalimitra.jpg')}}" alt="Card image cap" />
      <div class="card-body text-center"> 
        <a href="{{ route('data_arsip.index') }}" class="card-link">
          <h5 class="card-title fw-bold">Data Pengembalian Barang Ke-Mitra </h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-10">
      <img class="card-img-top" src="{{ asset('template/assets/img/terimapegawai.jpg')}}" alt="Card image cap" />
      <div class="card-body text-center">
        <a href="{{ route('data_arsip.index') }}" class="card-link">
          <h5 class="card-title fw-bold">Data Pegawai Penerima Barang</h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-10">
      <img class="card-img-top" src="{{ asset('template/assets/img/kembalipegawai.jpg')}}" alt="Card image cap" />
      <div class="card-body text-center">
        <a href="{{ route('data_arsip.index') }}" class="card-link">
          <h5 class="card-title fw-bold">Data Pengembalian Barang Pegawai</h5>
        </a>
      </div>
    </div>
  </div>
  <div class="col mb-3">
    <div class="card h-10">
      <img class="card-img-top" src="{{ asset('template/assets/img/suratBA.jpg')}}" alt="Card image cap" />
      <div class="card-body text-center">
      <a href="{{ route('data_arsip.index') }}" class="card-link">
          <h5 class="card-title fw-bold">Data Arsip Surat Berita Acara</h5>
        </a>
      </div>
    </div>

@endsection