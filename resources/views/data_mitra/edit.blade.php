@extends('layouts.master')
@section('content')
<div class="mb-3">
    <h4>Edit Data Barang Dari Mitra</h4>
    <form method="post" action="{{ route('data_mitra.update', $data_mitra->id) }}">
        @csrf
        @method('POST') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
        <div class="mb-3">
            <label for="mitra_pengirim">Nama Pegawai</label>
            <input type="text" name="mitra_pengirim" id="mitra_pengirim" class="form-control" value="{{ $data_mitra->mitra_pengirim }}">
        </div>
        <div class="mb-3">
            <label for="type_barang">Type Barang</label>
            <select name="type_barang" id="type_barang" class="form-select">
                <option selected>Open this select menu</option>
                <option value="Basic" {{ $data_penerima->type_barang === 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Medium" {{ $data_penerima->type_barang === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Premium" {{ $data_penerima->type_barang === 'Premium' ? 'selected' : '' }}>Premium</option>
                <option value="Exclusive" {{ $data_penerima->type_barang === 'Exclusive' ? 'selected' : '' }}>Exclusive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="{{ $data_mitra->jenis_barang }}">
        </div>
        <div class="form-group">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" name="merk_barang" id="merk_barang" class="form-control" value="{{ $data_mitra->merk_barang }}">
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" value="{{ $data_mitra->jumlah_barang }}">
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $data_mitra->serial_number }}">
        </div>
        <div class="form-group">
            <label for="kelengkapan_barang">Kelengkapan Barang</label>
            <textarea name="kelengkapan_barang" id="kelengkapan_barang" class="form-control" rows="3">{{ $data_mitra->kelengkapan_barang }}</textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" class="form-control" value="{{ $data_mitra->tanggal_penerimaan }}">
        </div>
        <div class="form-group">
            <label for="yang_Menerima">Yang Menerima</label>
            <input type="text" name="yang_menerima" id="yang_menerima" class="form-control" value="{{ $data_mitra->yang_menerima }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
