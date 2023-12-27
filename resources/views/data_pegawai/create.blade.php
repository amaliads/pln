@extends('layouts.master')
@section('title')
<nav aria-label="breadcrumb">
<ol class="breadcrumb" style="font-size: 14px;">
        <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
        <li class="breadcrumb-item"><a href="/data_penerimas">Data Pegawai Pihak I</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">TAMBAH DATA PEGAWAI PIHAK I</h2>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
   
    <form method="POST" action="{{ route('data_pegawai.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama_pihak">Nama Pegawai</label>
            <input type="text" name="nama_pihak" id="nama_pihak" class="form-control">
        </div>
        <div class="mb-3">
            <label for="NIP">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control">
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control">
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
