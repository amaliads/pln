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
        <div class="row justify-content-end">
            <div class="col-md-6"> <!-- Ubah ukuran kolom agar sesuai dengan konten -->
                <div class="card bg-glass custom-card"> <!-- Tambahkan class custom-card -->
                    <div class="card-body px-4 py-5 px-md-5">
                        <h2 class="fw-bold mb-4 text-center text-uppercase login-title">INFO</h2>
                        <div class="container">
                        <div class="row">
                                <div class="col">
                                    <h5 class="fw text-uppercase mb-2">Apabila akan registrasi akun silahkan hubungi contact person dibawah ini :</h5>
                                    <table class="table">
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
                        <!-- Tambahkan tombol back ke halaman login -->
                        <div class="text-center mt-4">
                            <a href="/" class="btn btn-primary">Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>