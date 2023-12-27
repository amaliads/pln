<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
        background-image: url('{{asset('template/assets/img/bg1.jpg')}}');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center; /* Menambahkan properti background-position */
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
            font-size: 20px;
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
      backdrop-filter: saturate(200%) blur(25px);
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
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
        <div class="card bg-glass" style="border-radius: 20px;">
                <div class="card-body px-4 py-5">
                    <div class="text-center mb-4">
                        <img src="{{asset('template/assets/img/LOGOPLN.png')}}" alt="Logo Welcome" class="logo" style="width: 90px;">
                        <h5 class="fw-bold mb-0 text-uppercase login-title">RESET PASSWORD<br> SISTEM PENDATAAN BARANG</h5>
                    </div>
                <form method="post" action="{{ route('data_register.updateforget') }}">
            @csrf
            @method('post') <!-- Anda perlu menambahkan metode PUT untuk pembaruan -->
        
            <div class="mb-3">
        <label for="email" class="form-label">Alamat E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
        <!-- Tambahkan atribut 'required' untuk memastikan alamat email diisi -->
    </div>

    <div class="mb-3">
        <label for="new_password" class="form-label">Password Baru</label>
        <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Password" required>
        <!-- Tambahkan atribut 'required' untuk memastikan password baru diisi -->
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
        <!-- Tambahkan atribut 'required' untuk memastikan konfirmasi password diisi -->
    </div>

    <div class="mb-3 d-grid">
        <button type="submit" class="btn rounded-pill me-2 btn-primary">Simpan Perubahan</button>
        <!-- Mengubah teks tombol 'Save Changes' menjadi 'Simpan Perubahan' agar lebih jelas -->
    </div>
</form>

<div class="mb-3 d-grid">
    <a href="/" class="btn-label rounded-pill me-2 btn-primary">Kembali ke Halaman Login</a>
    <!-- Mengubah teks tombol 'Back to Login' menjadi 'Kembali ke Halaman Login' agar lebih jelas -->
</div>
        </form>
    </div>
</div>