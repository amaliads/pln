@extends('layouts.master')
@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Penerima Pegawai</span>/<span style="font-weight: bold;">Tambah Edit Data</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">EDIT DATA PENERIMA BARANG PEGAWAI</h2>
        <form method="post" action="{{ route('data_penerimas.update', $data_penerimas->id) }}">
        @csrf
        @method('post') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
        <div class="mb-3">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="{{ $data_penerimas->nama_pegawai }}">
        </div>
        <div class="mb-3">
            <label for="NIP">NIP</label>
            <input type="text" name="NIP" id="NIP" class="form-control" value="{{ $data_penerimas->NIP }}">
        </div>
        <div class="mb-3">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $data_penerimas->jabatan }}">
        </div>
        <div class="mb-3">
            <label for="type_barang">Type Barang</label>
            <select name="type_barang" id="type_barang" class="form-select">
                <option selected>Open this select menu</option>
                <option value="Basic" {{ $data_penerimas->type_barang === 'Basic' ? 'selected' : '' }}>Basic</option>
                <option value="Medium" {{ $data_penerimas->type_barang === 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="Premium" {{ $data_penerimas->type_barang === 'Premium' ? 'selected' : '' }}>Premium</option>
                <option value="Exclusive" {{ $data_penerimas->type_barang === 'Exclusive' ? 'selected' : '' }}>Exclusive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_barang">Jenis Barang</label>
            <input type="text" name="jenis_barang" id="jenis_barang" class="form-control" value="{{ $data_penerimas->jenis_barang }}">
        </div>
        <div class="form-group">
            <label for="merk_barang">Merk Barang</label>
            <input type="text" name="merk_barang" id="merk_barang" class="form-control" value="{{ $data_penerimas->merk_barang }}">
        </div>
        <div class="form-group">
            <label for="jumlah_barang">Jumlah Barang</label>
            <input type="text" name="jumlah_barang" id="jumlah_barang" class="form-control" value="{{ $data_penerimas->jumlah_barang }}">
        </div>
        <div class="form-group">
            <label for="serial_number">Serial Number</label>
            <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ $data_penerimas->serial_number }}">
        </div>
        <div class="form-group">
            <label for="kelengkapan_barang">Kelengkapan Barang</label>
            <textarea name="kelengkapan_barang" id="kelengkapan_barang" class="form-control" rows="3">{{ $data_penerimas->kelengkapan_barang }}</textarea>
        </div>
        <div class="form-group">
            <label for="tanggal_penerimaan">Tanggal Penerimaan</label>
            <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan" class="form-control" value="{{ $data_penerimas->tanggal_penerimaan }}">
        </div>
        <div class="mb-3">
    <label for="tanggal_pengembalian" id="tanggal_pengembalian_label" style="display: none;">Tanggal Pengembalian</label>
    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" style="display: none;">
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

<button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
<button type="submit" class="btn btn-secondary" id="btnDikembalikan" style="display: none;">Dikembalikan</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#status_dikembalikan').click(function () {
            $('#tanggal_pengembalian_label').show();
            $('#tanggal_pengembalian').show();
            $('#btnSimpan').hide();
            $('#btnDikembalikan').show();
        });

        $('#status_diterima').click(function () {
            $('#tanggal_pengembalian_label').hide();
            $('#tanggal_pengembalian').hide();
            $('#btnSimpan').show();
            $('#btnDikembalikan').hide();
        });

        $('#btnDikembalikan').click(function () {
            // Lakukan aksi pengembalian disini
            // Misalnya, submit form ke endpoint pengembalian
            // atau lakukan proses lain yang diperlukan
            alert('Proses pengembalian dilakukan!');
        });
    });
</script>
    </form>
</div>
@endsection
