@extends('layouts.master')

@section('title')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 14px;">
            <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Pegawai Pihak I</li>
        </ol>
    </nav>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">DATA PEGAWAI PIHAK I</h2>
            @include('partials.flash_message')

            <button type="button" class="btn btn-outline-primary me-2">
                <span class="tf-icons bx bxs-edit-alt"></span>Edit Data
            </button>

            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        @foreach ($data_pegawai as $pegawai)
                            <tr>
                                <td>Nama Pegawai Pihak I</td>
                                <td><a>{{ $pegawai->nama_pihak }}</a></td>
                            </tr>
                            <tr>
                                <td>NIP</td>
                                <td><a>{{ $pegawai->NIP }}</a></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><a>{{ $pegawai->jabatan }}</a></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><a>{{ $pegawai->alamat }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- <div class="pull-left">
                <strong>
                    Jumlah Penerima: {{ $jumlah_penerima }}
                </strong>
            </div> -->
        </div>
    </div>
@endsection
