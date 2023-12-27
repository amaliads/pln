@extends('layouts.master')
@section('title')
<nav aria-label="breadcrumb">
<ol class="breadcrumb" style="font-size: 14px;">
        <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
        <li class="breadcrumb-item active"><a href="/myprofil">My Profil</a></li>
    </ol>
</nav>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h3 class="card-title" style="text-align: left; font-weight: bold; font-size: 24px;">My Profil</h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tbody>
                <tr>
                    @if(Auth::check())
                        <td>Nama</td>
                        <td><a>{{Auth::user()->name}}</a></td>
                    @endif
                </tr>
                <tr>
                    @if(Auth::check())
                        <td>Email</td>
                        <td><a>{{Auth::user()->email}}</a></td>
                    @endif
                </tr>
                <tr>
                    @if(Auth::check())
                        <td>No HP</td>
                        <td><a>{{Auth::user()->nohp}}</a></td>
                    @endif
                </tr>
                <tr>
                    @if(Auth::check())
                        <td>Alamat</td>
                        <td><a>{{Auth::user()->alamat}}</a></td>
                    @endif
                </tr>
                <tr>
                    @if(Auth::check())
                        <td>Jabatan</td>
                        <td><a>{{Auth::user()->jabatan}}</a></td>
                    @endif
                </tr>
                <tr>
                    @if(Auth::check())
                        <td>Password</td>
                        <td>
                            <!-- Button untuk memicu modal penggantian kata sandi -->
                            <a class="btn rounded-pill me-2 btn-danger" href="/data_register/edit" style="display: inline-block; vertical-align: middle;">Change Password</a>
                        </td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
@endsection
