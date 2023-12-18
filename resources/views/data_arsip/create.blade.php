use Carbon\Carbon;
@extends('layouts.master')

@section('title')
    <h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Data Arsip BA</span></h4>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA ARSIP SURAT BERITA ACARA</h2>
            <div style="display: flex; justify-content: space-between;">
                <a href="{{ route('data_arsip.create') }}" class="btn btn-primary">Tambah Arsip</a>
            </div>
            <form action="{{ route('data_arsip.search') }}" method="get" class="form-inline mb-2">
                @csrf
                <div class="input-group">
                    <input type="text" name="kata" class="form-control" placeholder="Cari...">
                    <button type="submit" class="btn btn-primary"><i class="bx bx-search"></i> Cari</button>
                </div>
                @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{ route('data_arsip.store') }}">
    @method('post')
    @csrf
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
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $surat->tanggal_surat)->format('d-m-Y') }}</td>
                                <td>{{ $surat->nomor_surat }}</td>
                                <td>{{ $surat->perihal_surat }}</td>
                                <td>{{ $surat->dari_surat }}</td>
                                <td>
                                    @if ($surat->file_surat)
                                        <a href="{{ asset('storage/' . $surat->file_surat) }}" target="_blank">{{ $surat->file_surat }}</a>
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
                                                @method('DELETE')
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
        </div>
    </div>
@endsection
