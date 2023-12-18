@extends('layouts.master')
@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span a href="/data_register.index" style="color: black;"style="font-weight: bold;">Info Akun</span>/<span style="font-weight: bold;">Registrasi Akun</span></h4>
@endsection
@section('content')
<div class="card">
<div class="card-body">
<div class="container">
    <h4>Registrasi Akun</h4>
    @if (count($errors) > 0)
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
        <form method="POST" action="{{ route('data_register.store') }}">
            @csrf
            <div class="mb-2">
                <label for="name" class="form-label">Nama</label>
                <input type="name" name="name" class="form-control">
            </div>
            <div class="mb-2">
            <label for="role">Sebagai</label>
            <select name="role" id="role" class="form-select">
                <option selected>Open this select menu</option>
                <option value="Adminn">Admin</option>
                <option value="Pengguna">Pengguna</option>
            </select>
        </div>
            <div class="mb-2">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="{{ old('email')}}" name="email" class="form-control">
            </div>
            <div class="mb-2">
                <label for="nohp" class="form-label">No HP</label>
                <input type="nohp" name="nohp" class="form-control">
            </div>
            <div class="mb-2">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="alamat" name="alamat" class="form-control">
            </div>
            <div class="mb-2">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="jabatan" name="jabatan" class="form-control">
            </div>
            <div class="mb-2">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-2 d-grid">
                <button name="submit" type="submit" class="btn btn-primary">Daftar</button>
            </div>
        </form>
    </div> 
    </div>
@endsection