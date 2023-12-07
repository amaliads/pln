@extends('layouts.master')

@section('title')
<h2>DATA PENGEMBALIAN BARANG PEGAWAI</h2>
    @include('partials/flash_message')
    <div style="display: flex; justify-content: space-between;">
            <a href="{{ route('data_pengembalian.data_pengembalian_pdf') }}" class="btn btn-secondary">Print Data Pengembalian Barang Pegawai</a>
        </div>
    </div>
    @include('partials.flash_message')
    <form action="{{ route('data_pengembalian.search') }}" method="get" class="form-inline mt-3">
        @csrf
        <div class="input-group">
            <input type="text" name="kata" class="form-control" placeholder="Cari...">
            <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
        </div>
        <br> </br>
    </form>
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-bordered">
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
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_pengembalian as $barang)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $barang->nama_pegawai }}</td>
                    <td>{{ $barang->NIP }}</td>
                    <td>{{ $barang->jabatan }}</td>
                    <td>{{ $barang->type_barang }}</td>
                    <td>{{ $barang->jenis_barang }}</td>
                    <td>{{ $barang->merk_barang }}</td>
                    <td>{{ $barang->jumlah_barang }}</td>
                    <td>{{ $barang->serial_number }}</td>
                    <td>{{ $barang->kelengkapan_barang }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $barang->tanggal_pengembalian)->format('d-m-Y') }}</td>
                    <td>
                        <span class="badge rounded-pill {{ $barang->status === 'update' ? 'bg-label-danger' : ($barang->status === 'store' ? 'badge rounded-pill' : 'bg-label-danger') }} me-1">{{ $barang->status }}</span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('data_pengembalian.edit', $barang->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i>Edit
                                </a>
                                <form method="POST" action="{{ route('data_pengembalian.destroy', $barang->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('POST') <!-- Mengubah method menjadi DELETE -->
                                    <button type="submit" class="dropdown-item">
                                        <i class="bx bx-trash me-1"></i>Delete
                                    </button>
                                </form>
                                <a class="dropdown-item" href="{{ route('data_pengembalian.data_pengembalian_pdf', ['id' => $barang->id]) }}">
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
            Jumlah Pengembalian: {{ $jumlah_data }}
        </strong>
        <p>{{ $data_pengembalian->links()}}</p>
    </div>
</div>
@endsection
