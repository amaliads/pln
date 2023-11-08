@extends('layouts.master')
@section('content')
<div class="mb-3">
    <h4>Edit Data Pegawai Pengembalian Barang</h4>
    <form method="post" action="{{ route('data_pengembalian.update', $data_pengembalian->id) }}">
        @csrf
        @method('POST') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
        <div class="mb-3">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="{{ $data_pengembalian->nama_pegawai }}">
        </div>
        <div class="mb-3">
            <label for="NIP">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control" value="{{ $data_pengembalian->NIP }}">
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $data_pengembalian->jabatan }}">
        </div>
        <div class="mb-3">
            <label for="type_barang">Type Barang</label>
            <select name="type_barang" id="type_barang" class="form-select">
                <option selected>Open this select menu</option>
                <option value="Basic" {{ $data_pengembalian->type_barang === 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Medium" {{ $data_pengembalian->type_barang === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Premium" {{ $data_pengembalian->type_barang === 'Premium' ? 'selected' : '' }}>Premium</option>
                <option value="Exclusive" {{ $data_pengembalian->type_barang === 'Exclusive' ? 'selected' : '' }}>Exclusive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="{{ $data_pengembalian->jenis_barang }}">
        </div>
        <div class="form-group">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" name="merk_barang" id="merk_barang" class="form-control" value="{{ $data_pengembalian->merk_barang }}">
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" value="{{ $data_pengembalian->jumlah_barang }}">
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $data_pengembalian->serial_number }}">
        </div>
        <div class="form-group">
            <label for="kelengkapan_barang">Kelengkapan Barang</label>
            <textarea name="kelengkapan_barang" id="kelengkapan_barang" class="form-control" rows="3">{{ $data_pengembalian->kelengkapan_barang }}</textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" value="{{ $data_pengembalian->tanggal_pengembalian }}">
        </div>
        <div class="form-group">
            <p class="text-dark fw-medium d-block">Select Status Barang</p>
            <div class="form-check form-check-primary mt-3">
                <input name="status" class="form-check-input" type="radio" value="DITERIMA" id="status_diterima" {{ $data_pengembalian->status === 'DITERIMA' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_diterima"> DITERIMA </label>
            </div>
            <div class="form-check form-check-secondary">
                <input name="status" class="form-check-input" type="radio" value="DIKEMBALIKAN" id="status_dikembalikan" {{ $data_pengembalian->status === 'DIKEMBALIKAN' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_dikembalikan"> DIKEMBALIKAN</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
