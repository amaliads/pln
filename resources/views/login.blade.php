<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <style>
        body {
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQVNVEOM_wBLMNDp0rCPzBkV8baoFNQSIFPLWUzU_BD7rcgK6AoHptJJD9cxAbJSh8OwKM&usqp=CAU');
            background-size: cover;
            background-repeat: no-repeat;
        }

        .custom-card {
            background-color: transparent;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .custom-card .card-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
        }

        .custom-card .card-text {
            font-size: 16px;
            color: #555;
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
        }
    </style>
    <!-- ... -->
    <!-- CSS only -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card custom-card">
                    <div class="card-body">
                        <h1 class="card-title mb-4">Login</h1>
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
                            <div class="col-md-6 offset-md-4-left">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                            <div class="mb-3 d-grid">
                                <button name="submit" type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <a class="btn btn-link" href="/forget-password">
                                    Forgot Your Password?
                                </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
