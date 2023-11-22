@extends('layouts.master')

@section('title')
    <h2>Selamat Datang di Sistem Inventaris</h2>
@endsection

@section('content')
    <h6>Isi Konten</h6>
    <div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <h5 class="card-title">Card 1</h5>
          <p class="card-text">Isi dari card pertama.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-secondary text-white">
        <div class="card-body">
          <h5 class="card-title">Card 2</h5>
          <p class="card-text">Isi dari card kedua.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card bg-info text-white">
        <div class="card-body">
          <h5 class="card-title">Card 3</h5>
          <p class="card-text">Isi dari card ketiga.</p>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection