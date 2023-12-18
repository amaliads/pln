@extends('layouts.master')
@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Penerima Barang Dari Mitra</span>/<span style="font-weight: bold;">Tambah Data</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
<div class="mb-3">
    <h4>Tambah Data Penerima Barang Mitra</h4>
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    
    <form method="post" action="{{ route('data_mitra.store') }}">
    @method('post')
    @csrf
        <div class="mb-3">
            <label for="mitra_pengirim">Mitra Pengirim</label>
            <input type="text" name="mitra_pengirim" id="mitra_pengirim" class="form-control" value="{{ old('mitra_pengirim') }}">
        </div>
        <div class="mb-3">
            <label for="type_barang">Type Barang</label>
            <select name="type_barang" id="type_barang" class="form-select">
                <option value="Basic" {{ old('type_barang') === 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Medium" {{ old('type_barang') === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Premium" {{ old('type_barang') === 'Premium' ? 'selected' : '' }}>Premium</option>
                <option value="Exclusive" {{ old('type_barang') === 'Exclusive' ? 'selected' : '' }}>Exclusive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="{{ old('jenis_barang') }}">
        </div>
        <div class="form-group">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" name="merk_barang" id="merk_barang" class="form-control" value="{{ old('merk_barang') }}">
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" value="{{ old('jumlah_barang') }}">
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ old('serial_number') }}">
        </div>
        <div class="form-group">
            <label for="kelengkapan_barang">Kelengkapan Barang</label>
            <textarea name="kelengkapan_barang" id="kelengkapan_barang" class="form-control" rows="3">{{ old('kelengkapan_barang') }}</textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" class="form-control" value="{{ old('tanggal_penerimaan') }}">
        </div>
        <div class="form-group">
            <label for="yang_menerima">Yang Menerima</label>
            <input type="text" name="yang_menerima" id="yang_menerima" class="form-control" value="{{ old('yang_menerima') }}">
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
