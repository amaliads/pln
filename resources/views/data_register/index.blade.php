@extends('layouts.master')

@section('title')
    <h1>INFO AKUN</h1>
    @include('partials/flash_message')
    <div align="left">
        <a href="{{ route('data_register.create') }}" class="btn btn-primary">Tambah Akun</a>
            @csrf
    </div>
    <br></br>
@endsection


@section('content')
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Sebagai</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Alamat</th>
                <th>Jabatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_register as $users)
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->role }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->nohp }}</td>
                    <td>{{ $users->alamat }}</td>
                    <td>{{ $users->jabatan }}</td>
                    <td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pull-left">
        <p>{{ $data_register->links()}}</p>
    </div>
</div>
@endsection