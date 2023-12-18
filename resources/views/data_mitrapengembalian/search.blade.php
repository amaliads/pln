@extends('layouts.master')

@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Pengembalian Barang ke Mitra</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PENGEMBALIAN BARANG KE MITRA</h2>
        @include('partials.flash_message')
        @if(count($data_mitrapengembalian))
        <div style="float: left;">
            <a href="{{ route('data_mitrapengembalian_tabel') }}" class="btn btn-dark">Print List Data</a>
        </div>
            @csrf
            <div class="input-group mb-2">
                <input type="text" name="kata" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
            </div>
        </form>
    </div>

    <div class="table-responsive">
            <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Mitra Pengirim</th>
                <th>Type Barang</th>
                <th>Jenis Barang</th>
                <th>Merk Barang</th>
                <th>Jumlah Barang</th>
                <th>Serial Number</th>
                <th>Kelengkapan Barang</th>
                <th>Tanggal Pengembalian</th>
                <th>Yang Menerima</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_mitrapengembalian  as $mitrakembali)
                <tr>
                    <td>{{ $mitrakembali->id }}</td>
                    <td>{{ $mitrakembali->mitra_pengirim }}</td>
                    <td>{{ $mitrakembali->type_barang }}</td>
                    <td>{{ $mitrakembali->jenis_barang }}</td>
                    <td>{{ $mitrakembali->merk_barang }}</td>
                    <td>{{ $mitrakembali->jumlah_barang }}</td>
                    <td>{{ $mitrakembali->serial_number }}</td>
                    <td>{{ $mitrakembali->kelengkapan_barang }}</td>
                    <td>{{ $mitrakembali->tanggal_pengembalian }}</td>
                    <td>{{ $mitrakembali->yang_menerima }}</td>
                        <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_mitrapengembalian.edit', $mitrakembali->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_pengembalian.destroy', $mitrakembali->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('POST') <!-- Ubah method ke DELETE -->
                                    <button type="submit" class="dropdown-item">
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
    <p>{{ $data_mitrapengembalian->links() }}</p>
    </div>
</div>
@else

<div>
    <h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/data_mitrapengembalian">Kembali</a>
</div>
@endif
@endsection
