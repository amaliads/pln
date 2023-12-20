@extends('layouts.master')

@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Pengembalian Barang ke Mitra</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PENGEMBALIAN BARANG KE MITRA</h2>
        @include('partials.flash_message')
        <div style="float: left;">
            <a href="{{ route('data_mitrapengembalian_tabel') }}" class="btn btn-dark me-2">
            <span class="bx bx-printer me-1"></span> Print Data
            </a>
            @csrf
        </div>
        <br><br>
        </div>
        <div class="table-responsive table-sm">
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
            @foreach ($data_mitrapengembalian as $mitrakembali)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
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
                    <span class="badge rounded-pill {{ $mitrakembali->status === 'update' ? 'bg-label-danger' : ($mitrakembali->status === 'store' ? 'badge rounded-pill' : 'bg-label-danger') }} me-1">{{ $mitrakembali->status }}</span>
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
</div>
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
