@extends('layouts.master')

@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Arsip Surat BA</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA ARSIP SURAT BA</h2>
        @include('partials.flash_message')
    <div style="display: flex; justify-content: space-between;">
        <a href="{{ route('data_arsip.create') }}" class="btn btn-primary me-2">
            <span class="tf-icons bx bx-plus me-1"></span> Tambah Data
            </a>
    </div>

    <br>

    <div class="table-responsive table-sm">
    <table id="myTable" class="stripe row-border order-column" style="width:100%; font-size: 14px;">
            <thead>
                <tr>
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Tanggal <br> Surat</th>
                <th style="text-align: center;">Nomor <br> Surat</th>
                <th style="text-align: center;">Perihal <br>  Surat</th>
                <th style="text-align: center;">Asal <br> Surat</th>
                <th style="text-align: center;">File Surat</th>
                <th style="text-align: center;">Keterangan</th>
                <th style="text-align: center;">Tujuan Surat</th>
                <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_arsip as $surat)
                    <tr>
                        <td style="text-align: center;">{{ $surat->id }}</td>
                        <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $surat->tanggal_surat)->format('d-m-Y') }}</td>
                        <td>{{ $surat->nomor_surat }} </td>
                        <td>{{ $surat->perihal_surat }}</td>
                        <td>{{ $surat->dari_surat }}</td>
                        <td>
                            @if ($surat->file_surat)
                            <a href="{{asset('storage/'.$surat->file_surat)}}" target="_blank">{{ $surat->file_surat }}</a>
                            @else
                                Tidak ada file
                            @endif
                        </td>
                        <td>{{ $surat->keterangan }}</td>
                        <td>{{ $surat->tujuan_ke }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('data_arsip.edit', $surat->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i>Edit
                                    </a>
                                    <form method="POST" action="{{ route('data_arsip.destroy', $surat->id) }}"
                                          onsubmit="return confirm('Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="dropdown-item">
                                            <i class="bx bx-trash me-1"></i>Delete
                                        </button>
                                    </form>
                                </div>
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