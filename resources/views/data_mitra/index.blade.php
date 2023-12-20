@extends('layouts.master')

@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Penerima Barang Dari Mitra</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PENERIMA BARANG DARI MITRA</h2>
        @include('partials.flash_message')
        <br></br>
        <div style="float: left;">
    <a href="{{ route('data_mitra.create') }}" class="btn btn-primary me-2">
            <span class="tf-icons bx bx-plus me-1"></span> Tambah Data
    <a href="{{ route('data_mitra_tabelpdf') }}" class="btn btn-dark me-2">
            <span class="bx bx-printer me-1"></span> Print Data
            </a>

</div>

<br> </br>
        <form action="{{ route('data_mitra.search') }}" method="get" class="form-inline">
            @csrf
            <div class="input-group mb-2">
                <input type="text" name="kata" class="form-control" placeholder="Cari...">
                <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
    </div>
<div class="table-responsive">
<table id="myTable" class="stripe row-border order-column" style="width:10%">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Mitra</th>
            <th style="text-align: center;">Type <br> Barang</th>
            <th style="text-align: center;">Jenis <br> Barang</th>
            <th style="text-align: center;">Merk <br> Barang</th>
            <th style="text-align: center;">Jumlah <br> Barang</th>
            <th style="text-align: center;">Serial <br> Number</th>
            <th style="text-align: center;">Kelengkapan <br> Barang</th>
            <th style="text-align: center;">Tanggal <br> Penerimaan</th>
            <th style="text-align: center;">Yang <br> Menerima</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Action</th>
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
@endsection
@section('script')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            responsive: true
        });
    });
</script>
@endsection