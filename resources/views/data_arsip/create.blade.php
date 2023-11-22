@extends('layouts.master')

@section('content')
<div class="mb-3">
    <h4>Tambah Arsip Surat Berita Acara</h4>
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="post" action="{{ route('data_arsip.store') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Arsip Surat berita Acara</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('data_arsip.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="tanggal_surat">Tanggal Surat</label>
                                <input id="tanggal_surat" type="date" class="form-control" name="tanggal_surat" required>
                            </div>

                            <div class="form-group">
                                <label for="perihal_surat">Perihal Surat</label>
                                <input id="perihal_surat" type="text" class="form-control" name="perihal_surat" required>
                            </div>

                            <div class="form-group">
                                <label for="dari_surat">Dari Surat</label>
                                <input id="dari_surat" type="text" class="form-control" name="dari_surat" required>
                            </div>

                            <div class="form-group">
                                <label for="file_surat">Berkas Surat</label>
                                <input id="file_surat" type="file" class="form-control" name="file_surat" required>
                            </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" class="form-control" name="keterangan" rows="3"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="tujuan_ke">Tujuan Surat</label>
                                <input id="tujuan_ke" type="text" class="form-control" name="tujuan_ke" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Unggah Surat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection