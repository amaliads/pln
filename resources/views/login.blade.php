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
}
@media (max-width: 576px) {
    .card {
        width: 100%;
        margin: 0 auto;
        /* Atur properti lainnya sesuai kebutuhan */
    }
}

/* Untuk card pada layar tablet */
@media (min-width: 577px) and (max-width: 1024px) {
    .card {
        width: 100%;
        margin: 0 auto;
        /* Atur properti lainnya sesuai kebutuhan */
    }
}

/* Untuk card pada layar desktop */
@media (min-width: 1025px) {
    .card {
        width: 100%;
        margin: 0 auto;
        /* Atur properti lainnya sesuai kebutuhan */
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
                        <h6 class="fw-bold mb-0 text-uppercase login-title">LOGIN SIDABAR <br> SISTEM PENDATAAN BARANG <br> PT. PLN UID JATENG & DIY</h6>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="email" value="{{ old('email')}}" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="mb-3 d-grid">
                            <button name="submit" type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <p class="mb-3"><a class="text-primary" href="/data_register/forget">Forgot password?</a></p>
                        <p class="mb-0">Don't have an account? <a href="/reg-admin" class="link-info">Register here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
