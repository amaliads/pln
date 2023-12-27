@extends('layouts.master')
@section('title')
<nav aria-label="breadcrumb">
<ol class="breadcrumb" style="font-size: 14px;">
        <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
        <li class="breadcrumb-item"><a href="/data_penerimas">Penerimaan Barang Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PENERIMA BARANG PEGAWAI</h2>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
   
    <form method="POST" action="{{ route('data_penerimas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control">
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
            <label for="type_barang">Type Barang</label>
            <select name="type_barang" id="type_barang" class="form-select">
                <option selected>Open this select menu</option>
                <option value="Basic">Basic</option>
                <option value="Medium">Medium</option>
                <option value="Premium">Premium</option>
                <option value="Exclusive">Exclusive</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control">
        </div>
        <div class="mb-3">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" name="merk_barang" id="merk_barang" class="form-control">
        </div>
        <div class="mb-3">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control">
        </div>
        <div class="mb-3">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control">
        </div>
        <div class="mb-3">
            <label for="kelengkapan_barang">Kelengkapan Barang</label>
            <textarea name="kelengkapan_barang" id="kelengkapan_barang" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" class="form-control">
        </div>
        <div class="form-group">
            <p class="text-dark fw-medium d-block">Select Status Barang</p>
            <div class="form-check form-check-primary mt-3">
                <input name="status" class="form-check-input" type="radio" value="DITERIMA" id="status_diterima" checked />
                <label class="form-check-label" for="status_diterima"> DITERIMA </label>
            </div>
            <div class="form-check form-check-secondary">
                <input name="status" class="form-check-input" type="radio" value="DIKEMBALIKAN" id="status_dikembalikan" />
                <label class="form-check-label" for="status_dikembalikan"> DIKEMBALIKAN</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
