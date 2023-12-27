@extends('layouts.master')
@section('title')
<nav aria-label="breadcrumb">
<ol class="breadcrumb" style="font-size: 14px;">
        <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
        <li class="breadcrumb-item"><a href="/data_mitrapengembalian">Data Pengembalian Barang Mitra</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Pengembalian Barang Mitra</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">EDIT DATA PENERIMA BARANG PEGAWAI</h2>
    <br></br>
    <form method="post" action="{{ route('data_mitrapengembalian.update', $data_mitrapengembalian->id) }}">
        @csrf
        @method('post') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
        <div class="mb-3">
            <label for="mitra_pengirim">Nama Pegawai</label>
            <input type="text" name="mitra_pengirim" id="mitra_pengirim" class="form-control" value="{{ $data_mitrapengembalian->mitra_pengirim}}">
        </div>
        <div class="mb-3">
            <label for="type_barang">Type Barang</label>
            <select name="type_barang" id="type_barang" class="form-select">
                <option selected>Open this select menu</option>
                <option value="Basic" {{ $data_mitrapengembalian->type_barang === 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Medium" {{ $data_mitrapengembalian->type_barang === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Premium" {{ $data_mitrapengembalian->type_barang === 'Premium' ? 'selected' : '' }}>Premium</option>
                <option value="Exclusive" {{ $data_mitrapengembalian->type_barang === 'Exclusive' ? 'selected' : '' }}>Exclusive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="{{ $data_mitrapengembalian->jenis_barang }}">
        </div>
        <div class="form-group">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" name="merk_barang" id="merk_barang" class="form-control" value="{{ $data_mitrapengembalian->merk_barang }}">
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" value="{{ $data_mitrapengembalian->jumlah_barang }}">
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $data_mitrapengembalian->serial_number }}">
        </div>
        <div class="form-group">
            <label for="kelengkapan_barang">Kelengkapan Barang</label>
            <textarea name="kelengkapan_barang" id="kelengkapan_barang" class="form-control" rows="3">{{ $data_mitrapengembalian->kelengkapan_barang }}</textarea>
        </div>
        <div class="form-group">
            <label for="yang_Menerima">Yang Menerima</label>
            <input type="text" name="yang_menerima" id="yang_menerima" class="form-control" value="{{ $data_mitrapengembalian->yang_menerima }}">
        </div>
        <div class="form-group">
            <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
            <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" value="{{ $data_mitrapengembalian->tanggal_pengembalian }}">
        </div>
        <div class="form-group">
            <p class="text-dark fw-medium d-block">Select Status Barang</p>
            <div class="form-check form-check-primary mt-3">
                <input name="status" class="form-check-input" type="radio" value="DITERIMA" id="status_diterima" {{ $data_mitrapengembalian->status === 'DITERIMA' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_diterima"> DITERIMA </label>
            </div>
            <div class="form-check form-check-secondary">
                <input name="status" class="form-check-input" type="radio" value="DIKEMBALIKAN" id="status_dikembalikan" {{ $data_mitrapengembalian->status === 'DIKEMBALIKAN' ? 'checked' : '' }}>
                <label class="form-check-label" for="status_dikembalikan"> DIKEMBALIKAN</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
</script>
    </form>
</div>
@endsection