@extends('layouts.master')

@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Penerimaan Barang Dari Mitra</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PENERIMAAN BARANG DARI MITRA</h2>
        @include('partials.flash_message')
        <br></br>
        <div style="float: left;">
    <a href="{{ route('data_mitra.create') }}" class="btn btn-primary">Tambah Data </a>
    <a href="{{ route('data_mitra_tabelpdf') }}" class="btn btn-dark">Print List Data</a>
</div>

<br> </br>
        <form action="{{ route('data_mitra.search') }}" method="get" class="form-inline">
            @csrf
            <div class="input-group mb-2">
                <input type="text" name="kata" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
    </div>
<div class="table-responsive">
            <table class="table table-striped table-sm">
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
            @foreach ($data_mitra as $mitra)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $mitra->mitra_pengirim }}</td>
                    <td>{{ $mitra->type_barang }}</td>
                    <td>{{ $mitra->jenis_barang }}</td>
                    <td>{{ $mitra->merk_barang }}</td>
                    <td>{{ $mitra->jumlah_barang }}</td>
                    <td>{{ $mitra->serial_number }}</td>
                    <td>{{ $mitra->kelengkapan_barang }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $mitra->tanggal_penerimaan)->format('d-m-Y') }}</td>
                    <td>{{ $mitra->yang_menerima }}</td>
                    <td>
                    <span class="badge rounded-pill {{ $mitra->status === 'update' ? 'bg-label-primary' : ($mitra->status === 'store' ? 'badge rounded-pill' : 'bg-label-success') }} me-1">{{ $mitra->status }}</span>
                    <td>
                    <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_mitra.edit', $mitra->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_mitra.destroy', $mitra->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
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
        <p>{{ $data_mitra->links() }}</p>
    </div>
</div>
@endsection
