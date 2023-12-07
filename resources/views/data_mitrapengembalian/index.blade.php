@extends('layouts.master')

@section('title')
    <h2>DATA PENGEMBALIAN BARANG DARI MITRA</h2>
    @include('partials/flash_message')
    <div style="display: flex; justify-content: space-between;">
    <a href="{{ route('data_mitrapengembalian_tabel') }}" class="btn btn-dark">Print Data Daftar Barang Mitra</a>
</div>

<br> </br>
        <form action="{{ route('data_mitrapengembalian.search') }}" method="get" class="form-inline">
            @csrf
            <div class="input-group mb-2">
                <input type="text" name="kata" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
    </div>
@endsection

@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mitra</th>
                <th>Type Barang</th>
                <th>Jenis Barang</th>
                <th>Merk Barang</th>
                <th>Jumlah Barang</th>
                <th>Serial Number</th>
                <th>Kelengkapan Barang</th>
                <th>Tanggal Penerimaan</th>
                <th>Yang Menerima</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_mitrapengembalian as $mitrakembali)
                <tr>
                    <td>{{ $mitrakembali->id }}</td>
                    <td>{{ $mitrakembali->mitra_pengirim }}</td>
                    <td>{{ $mitrakembali->type_barang }}</td>
                    <td>{{ $mitrakembali->jenis_barang }}</td>
                    <td>{{ $mitrakembali->merk_barang }}</td>
                    <td>{{ $mitrakembali->jumlah_barang }}</td>
                    <td>{{ $mitrakembali->serial_number }}</td>
                    <td>{{ $mitrakembali->kelengkapan_barang }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $mitrakembali->tanggal_pengembalian)->format('d-m-Y') }}</td>
                    <td>{{ $mitrakembali->yang_menerima }}</td>
                    <td>
                    <span class="badge rounded-pill {{ $mitrakembali->status === 'update' ? 'bg-label-primary' : ($mitrakembali->status === 'store' ? 'badge rounded-pill' : 'bg-label-success') }} me-1">{{ $mitrakembali->status }}</span>
                    <td>
                    <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_mitrapengembalian.edit', $mitrakembali->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_mitrapengembalian.destroy', $mitrakembali->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('POST') <!-- Ubah method ke DELETE -->
                                    <button type="submit" class="dropdown-item">
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                            </div>
                        </td>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pull-left">
        <strong>
            Jumlah : {{ $jumlah_data }}
        </strong>
        <p>{{ $data_mitrapengembalian->links() }}</p>
    </div>
</div>
@endsection
