@extends('layouts.master')

@section('title')
<h1>My Profil</h1>
@endsection

@section('content')
<div class="table-responsive">
<table class="table table-striped">
    <tbody>
        <tr>
            @if(Auth::check())
            <td>Nama</td>
            <td><a>{{Auth::user()->name}}</a></td>
            @else
            @endif
        </tr>
        <tr>
            @if(Auth::check())
            <td>Email</td>
            <td><a>{{Auth::user()->email}}</a></td>
            @else
            @endif
        </tr>
        <tr>
            @if(Auth::check())
            <td>No HP</td>
            <td><a>{{Auth::user()->nohp}}</a></td>
            @else
            @endif
        </tr>
        <tr>
            @if(Auth::check())
            <td>Alamat</td>
            <td><a>{{Auth::user()->alamat}}</a></td>
            @else
            @endif
        </tr>
        <tr>
            @if(Auth::check())
            <td>Jabatan</td>
            <td><a>{{Auth::user()->jabatan}}</a></td>
            @else
            @endif
        </tr>
        <tr>
                @if(Auth::check())
                <td>Password</td>
                <td>
                <!-- Button untuk memicu modal penggantian kata sandi -->
                <a class="btn btn-link" href="/data_register/edit">Change Password</a>
                </td>
                @else
                @endif
            </tr>
    </tbody>
</table>
  
</div>
@endsection