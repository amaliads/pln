@extends('layouts.master')

@section('title')
@if(count($data_penerima))
    <h1>DATA PENERIMAAN BARANG MITRA</h1>
    @include('partials/flash_message')
    <div align="right">
        <a href="{{ route('data_mitra.create') }}" class="btn btn-primary">Tambah Data Barang</a>
        <form action="{{ route('data_mitra.create') }}" method="get" class="form-inline">
            @csrf
            <div class="input-group mb-2">
                <input type="text" name="kata" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
            </div>
        </form>
    </div>
@endsection

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
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
                <th>Tanggal Penerimaan</th>
                <th>Yang Menerima</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_mitra as $mitra)
                <tr>
                    <td>{{ $mitra->id }}</td>
                    <td>{{ $mitra->mitra_pengirim }}</td>
                    <td>{{ $mitra->type_barang }}</td>
                    <td>{{ $mitra->jenis_barang }}</td>
                    <td>{{ $mitra->merk_barang }}</td>
                    <td>{{ $mitra->jumlah_barang }}</td>
                    <td>{{ $mitra->serial_number }}</td>
                    <td>{{ $mitra->kelengkapan_barang }}</td>
                    <td>{{ $item->tanggal_penerimaan }}</td>
                    <td>{{ $mitra->yang_menerima }}</td>
                        <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_penerima.edit', $item->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_penerima.destroy', $item->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
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
        <p>{{ $data_mitra->links()}}</p>
    </div>
</div>
@else

<div>
    <h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/data_mitra">Kembali</a>
</div>
@endif
@endsection
