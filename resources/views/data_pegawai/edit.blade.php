@extends('layouts.master')
@section('title')
<nav aria-label="breadcrumb">
<ol class="breadcrumb" style="font-size: 14px;">
        <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
        <li class="breadcrumb-item"><a href="/data_pegawai">Data Pegawai Pihak I</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
</nav>
@endsection
@section ('content')
<div class="card">
    <div class="card-body">
    <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">EDIT DATA PEGAWAI PIHAK I</h2>
        <form method="post" action="{{ route('data_pegawai.update', $data_pegawai->id) }}">
        @csrf
        @method('post') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
        <div class="mb-3">
            <label for="nama_pihak">Nama Pegawai</label>
            <input type="text" name="nama_pihak" id="nama_pihak" class="form-control" value="{{ $data_pegawai->nama_pihak }}">
        </div>
        <div class="mb-3">
            <label for="NIP">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control" value="{{ $data_pegawai->NIP }}">
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $data_pegawai->jabatan }}">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" rows="3">{{ $data_pegawai->alamat }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
        </form>
</div>
@endsection
