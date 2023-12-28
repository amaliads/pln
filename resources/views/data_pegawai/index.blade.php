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
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size: 14px;">
            <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pegawai Pengesahan Surat BA</li>
        </ol>
    </nav>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title text-center" style="font-weight: bold; font-size: 24px;">PEGAWAI PENGESAHAN SURAT BA</h2>
        @include('partials.flash_message')

        <div class="table-responsive">
            <table class="table table-transparent">
                <tbody>
                    @foreach ($data_pegawai as $pegawai)
                        <tr>
                            <td class="table-label">Nama Pegawai</td>
                            <td class="table-value"><a>{{ $pegawai->nama_pihak }}</a></td>
                        </tr>
                        <tr>
                            <td class="table-label">NIP</td>
                            <td class="table-value"><a>{{ $pegawai->NIP }}</a></td>
                        </tr>
                        <tr>
                            <td class="table-label">Jabatan</td>
                            <td class="table-value"><a>{{ $pegawai->jabatan }}</a></td>
                        </tr>
                        <tr>
                            <td class="table-label">Alamat</td>
                            <td class="table-value"><a>{{ $pegawai->alamat }}</a></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="button" class="btn btn-outline-primary me-2">
                                    <span class="tf-icons bx bxs-edit-alt"></span><a href="{{ route('data_pegawai.edit', $pegawai->id) }}">Edit Data</a>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

            <!-- <div class="pull-left">
                <strong>
                    Jumlah Penerima: {{ $jumlah_penerima }}
                </strong>
            </div> -->
        </div>
    </div>
@endsection
<style>
    .table-label {
        padding-right: 5px; /* Adjust the right padding to increase the space between label and value */
    }

    .table-value {
        padding-right: 5px; 
    }
</style>
