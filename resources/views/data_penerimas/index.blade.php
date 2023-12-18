use Carbon;
@extends('layouts.master')
@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Penerima Barang Pegawai</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PENERIMA BARANG PEGAWAI</h2>
        @include('partials.flash_message')
        <br></br>
        <div style="float: left;">
            <a href="{{ route('data_penerimas.create') }}" class="btn btn-primary">Tambah Data</a>
            <a href="{{ route('data_penerimas.data_penerima_tabelpdf') }}" class="btn btn-dark">Print List Data</a>
            @csrf
        </div>
        <br></br>
        <div class="input-group mb-2" style="clear: both;">
            <input type="text" name="kata" class="form-control" placeholder="Cari..." style="margin-right: 10px;">
            <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Type Barang</th>
                <th>Jenis Barang</th>
                <th>Merk Barang</th>
                <th>Jumlah Barang</th>
                <th>Serial Number</th>
                <th>Kelengkapan Barang</th>
                <th>Tanggal Penerimaan</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_penerimas as $item)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item->nama_pegawai }}</td>
                    <td>{{ $item->NIP }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->type_barang }}</td>
                    <td>{{ $item->jenis_barang }}</td>
                    <td>{{ $item->merk_barang }}</td>
                    <td>{{ $item->jumlah_barang }}</td>
                    <td>{{ $item->serial_number }}</td>
                    <td>{{ $item->kelengkapan_barang }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $item->tanggal_penerimaan)->format('d-m-Y') }}</td>
                    <td>
                    <span class="badge rounded-pill {{ $item->status === 'update' ? 'bg-label-primary' : ($item->status === 'store' ? 'badge rounded-pill' : 'bg-label-success') }} me-1">{{ $item->status }}</span>

                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_penerimas.edit', $item->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_penerimas.destroy', $item->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('POST') <!-- Ubah method ke DELETE -->
                                    <button type="submit" class="dropdown-item">
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                                </form>
                                <a class="dropdown-item" href="{{ route('data_penerimas.data_penerimas_pdf', ['id' => $item->id]) }}">
                                <i class="bx bx-print me-1"></i>Print
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        <strong>
            Jumlah Penerima: {{ $jumlah_penerima }}
        </strong>
        <p>{{ $data_penerimas->links() }}</p>
    </div>
</div>
@endsection   