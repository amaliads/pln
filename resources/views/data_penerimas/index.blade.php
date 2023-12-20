@extends('layouts.master')
<style>
#myTable {
    width: 5%; /* Atur lebar tabel menjadi 100% dari kontainer induk */
    /* atau atur lebar maksimum */
    /* max-width: 800px; */
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
 
    div.container {
        width: 80%;
    }
}
</style>
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
            <a href="{{ route('data_penerimas.create') }}" class="btn btn-primary me-2">
            <span class="tf-icons bx bx-plus me-1"></span> Tambah Data
            <a href="{{ route('data_penerimas.data_penerima_tabelpdf') }}" class="btn btn-dark me-2">
            <span class="bx bx-printer me-1"></span> Print Data
            </a>

            @csrf
        </div>
        <br></br>
        <div class="table-responsive table-sm">
        <table id="myTable" class="stripe row-border order-column" style="width:10%">
        <thead>
            <tr>
            <th style="text-align: center;">No</th>
            <th style="text-align: center;">Nama Pegawai</th>
            <th style="text-align: center;">NIP</th>
            <th style="text-align: center;">Jabatan</th>
            <th style="text-align: center;">Type <br> Barang</th>
            <th style="text-align: center;">Jenis <br> Barang</th>
            <th style="text-align: center;">Merk <br> Barang</th>
            <th style="text-align: center;">Jumlah</th>
            <th style="text-align: center;">Serial <br> Number</th>
            <th style="text-align: center;">Kelengkapan <br> Barang</th>
            <th style="text-align: center;">Tanggal <br> Penerimaan</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;">Action</th>
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
    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
        <i class="bx bx-dots-vertical-rounded"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('data_penerimas.edit', $item->id) }}">
            <i class="bx bx-edit-alt me-1"></i>Edit
        </a>
        <form method="POST" action="{{ route('data_penerimas.destroy', $item->id) }}" onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
            @csrf
            @method('DELETE') <!-- Ubah method ke DELETE -->
            <button type="submit" class="dropdown-item">
                <i class="bx bx-trash me-1"></i>Delete
            </button>
        <a class="dropdown-item" href="{{ route('data_penerimas.data_penerimas_pdf', ['id' => $item->id]) }}">
        <i class='bx bx-printer me-1'></i> Print
        </a>
    </div>
</div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--<div class="pull-left">
        <strong>
            Jumlah Penerima: {{ $jumlah_penerima }}
        </strong>
    </div> 
</div> -->
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