@extends('layouts.master')
@section('title')
<h4><a href="/adminn" style="color: black;">Home</a>/<span style="font-weight: bold;">Change Password</span></h4>
@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Change Your Password</h4>
        <form method="post" action="{{ route('data_register.update') }}">
            @csrf
            @method('post') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
            
            @if($data_register->count() > 0)
                <div class="mb-3">
                    <label for="email">Alamat E-mail</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{Auth::user()->email}}">
                </div>
            @else
                <p>Data tidak ditemukan.</p>
            @endif

            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <br></br>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</div>
@endsection
