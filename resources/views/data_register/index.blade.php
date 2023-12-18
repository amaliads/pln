@extends('layouts.master')
@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Info Akun</span></h4>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h2 class="card-title" style="text-align: center; font-weight: bold; font-size: 24px;">INFO AKUN</h2>
             @include('partials/flash_message')
             <div align="right">
                <a href="{{ route('data_register.create') }}" class="btn btn-primary">Registrasi Akun</a>
            @csrf
                </div>
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