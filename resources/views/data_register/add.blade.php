<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url('{{asset('template/assets/img/b.jpg')}}');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .custom-card {
            background-color: transparent;
            padding: 10px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            @media (max-width: 768px) {
    .custom-card {
        width: 90%; /* Misalnya, 90% dari lebar parent */
        /* Properti lainnya */
    }
}

/* Untuk layar berukuran sedang atau besar */
@media (min-width: 769px) {
    .custom-card {
        width: 50%; /* Misalnya, 50% dari lebar parent */
        /* Properti lainnya */
    }
}
        }

        .custom-card .card-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .custom-card .card-text {
            font-size: px;
            color: #555;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .custom-card form input[type="email"],
        .custom-card form input[type="password"] {
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
        }

        .custom-card form button[type="submit"] {
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 18px;
            font-weight: bold;
            color : #5D7671;
        }
        .btn-primary {
            text-align: center;
        }
        .text-primary {
    color: blue; /* Warna yang diinginkan untuk tautan Forgot password */
}

.mb-3,
.mb-2 {
    margin-bottom: 10px; /* Ubah angka sesuai dengan jarak yang diinginkan antar paragraf */
}
.bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(50px);
    }
    .login-title {
    text-align: center;
    font-size: 24px;
}

    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container py-5">
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
</body>
</html>