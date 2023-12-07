@extends('layouts.master')

@section('title')
@if(count($data_penerima))
    <h1>DATA PENERIMAAN BARANG MITRA</h1>
    @include('partials/flash_message')
    <div align="right">
        <a href="{{ route('data_arsip.create') }}" class="btn btn-primary">Tambah Arsip Surat</a>
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
                <th>Tanggal Surat</th>
                <th>Nomor Surat</th>
                <th>Perihal Surat</th>
                <th>Asal Surat</th>
                <th>File Surat</th>
                <th>Keterangan</th>
                <th>Tujuan Surat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_arsip as $surat)
                <tr>
                    <td>{{ $surat->id }}</td>
                    <td>{{ $surat->tanggal_surat }}</td>
                    <td>{{ $surat->nomor_surat }}</td>
                    <td>{{ $surat->perihal_surat }}</td>
                    <td>{{ $surat->dari_surat }}</td>
                    <td>{{ $surat->file_surat }}</td>
                    <td>{{ $surat->keterangan }}</td>
                    <td>{{ $surat->tujuan_ke }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_arsip.edit', $surat->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_arsip.destroy', $surat->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE') <!-- Mengubah method menjadi DELETE -->
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
        <p>{{ $data_arsip->links()}}</p>
    </div>
</div>
@else

<div>
    <h4>Data {{ $cari }} tidak ditemukan</h4>
    <a href="/data_arsip">Kembali</a>
</div>
@endif
@endsection
