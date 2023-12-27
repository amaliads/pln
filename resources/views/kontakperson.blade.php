@extends('layouts.master')
@section('title')
<nav aria-label="breadcrumb">
<ol class="breadcrumb" style="font-size: 14px;">
        <li class="breadcrumb-item"><a href="/adminn">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Contact Person</li>
    </ol>
</nav>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
    <h4 class="card-title" style="color: black;" style="font-weight: bold;" style="text-align: left; font-weight: bold; font-size: 24px;">Contact Person</h4>
<div class="table-responsive">
<table class="table table-striped">
    <tbody>
        <tr>
            <td>Nama</td>
            <td>Admin</td>
        </tr>
        <tr>
            <td>Bidang</td>
            <td>Aset dan Properti Umum</td>
        </tr>
        <tr>
            <td>Email</td>
            <td><a href="mailto:bidangumumdanaset@gmail.com">bidangumumdanaset@gmail.com</a></td>
        </tr>
        <tr>
            <td>WhatsApp</td>
            <td><a href="https://wa.me/+6282326763615">+6282326763615</a></td>
        </tr>
    </tbody>
</table>
  
</div>
@endsection