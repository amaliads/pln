@extends('layouts.master')
@section('content')
<div class="mb-3">
    <h4>Edit Data Barang Dari Mitra</h4>
    <form method="post" action="{{ route('data_arsip.update', $data_arsip->id) }}" enctype="multipart/form-data">
        @csrf
        @method('POST') <!-- Ubah method menjadi PUT -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Arsip Surat berita Acara</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal_surat">Tanggal Surat</label>
                                <input id="tanggal_surat" type="date" class="form-control" name="tanggal_surat" value="{{ $data_arsip->tanggal_surat }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nomor_surat">Nomor Surat</label>
                                <input id="nomor_surat" type="text" class="form-control" name="nomor_surat" value="{{ $data_arsip->nomor_surat}}" required>
                            </div>

                            <div class="form-group">
                                <label for="perihal_surat">Perihal Surat</label>
                                <input id="perihal_surat" type="text" class="form-control" name="perihal_surat" value="{{ $data_arsip->perihal_surat }}" required>
                            </div>

                            <div class="form-group">
                                <label for="dari_surat">Dari Surat</label>
                                <input id="dari_surat" type="text" class="form-control" name="dari_surat" value="{{ $data_arsip->dari_surat }}" required>
                            </div>

                            <div class="form-group">
                            <label for="file_surat">Berkas Surat</label>
                            @if($data_arsip->file_surat)
                            <p>File saat ini: {{ $data_arsip->file_surat }}</p>
                            @else
                            <p>Belum ada file yang diunggah</p>
                            @endif
                            <input id="file_surat" type="file" class="form-control" name="file_surat">
                                </div>

                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea id="keterangan" class="form-control" name="keterangan" rows="3">{{ $data_arsip->keterangan }} </textarea>
                            </div>

                            <div class="form-group">
                                <label for="tujuan_ke">Tujuan Surat</label>
                                <input id="tujuan_ke" type="text" class="form-control" name="tujuan_ke" value="{{ $data_arsip->tujuan_ke }}" required>
                            </div>


                            <button type="submit" class="btn btn-primary">Update Surat</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
