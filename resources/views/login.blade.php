<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AKMALOID</title>
    <script src="{{ asset('assets/fontawesome/js/all.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/fontawesome/css/all.css') }}" crossorigin="anonymous"></script>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app/style.css') }}">
</head>

<body class="d-flex flex-column container-fluid bg-warning-subtle justify-content-center align-items-center">

    <div class="row d-flex w-75">
        <div class="gambar-login col-md-6 mb-2">
            <div class="border border-black border-3 rounded-4" style="box-shadow:3px 3px black">
                <img src="{{ asset('assets/img/slide1.png') }}" class="img-fluid" alt="">
            </div>
        </div>
        <div class="form-login col-md-6 mb-2 bg-warning-subtle ps-3 pe-3 fw-bold rounded rounded-5 d-flex align-items-center border border-black border-3 rounded-4" style="box-shadow:3px 3px black">
            <div class="p-3 border border-black border-3 rounded-4" style="box-shadow:4px 4px black">
                <div class="border border-black border-3 rounded-bottom rounded-4 text-center p-2" style="box-shadow:3px 3px black">
                    <h2 class="fw-bold">SIGN IN</h2>
                    <small>Silahkan masukkan email dan password Anda yang telah terdafarkan</small>
                </div>
                @if($errors->has('credentials'))
                    <div class="alert alert-danger">
                        {{ $errors->first('credentials') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="py-3">
                    <form action="{{ route('autentikasi') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3 ">
                            <input type="email" name="email" class="form-control border border-black border-2" id="floatingInput" placeholder="name@example.com" required>
                            <label for="floatingInput">Email address</label>
                          </div>
                          <div class="form-floating mb-3 password-container">
                            <input type="password" name="password" class="form-control border border-black border-2" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                            <span class="password-toggle d-flex align-items-center pt-3" id="tog">
                                <p id="tertutup"><i class="fas fa-eye-slash"></i></p>
                                <p id="terbuka"><i class="fas fa-eye"></i></p>
                            </span>
                          </div>
                          <div class="mb-3">
                            <button type="submit" class="btn border border-black border-2 fw-bold w-100" style="box-shadow:2px 2px black">LOGIN</button>
                            @auth
                                @if (Auth::user()->role == 'admin')
                                        <a href="{{ url('/admin') }}" class="btn border border-black border-2 fw-bold w-100 mt-2" style="box-shadow:2px 2px black">KEMBALI</a>
                                @elseif (Auth::user()->role == 'pelanggan')
                                        <a href="{{ url('/user') }}" class="btn border border-black border-2 fw-bold w-100 mt-2" style="box-shadow:2px 2px black">KEMBALI</a>
                                @endif
                            @endauth
                          </div>
                          @guest
                            <div class="mb-3">
                                <div class="d-flex gap-2">
                                    <a type="button" class="btn border border-black border-2 fw-bold w-100" style="box-shadow:2px 2px black" href="/register">DAFTAR</a>
                                    <a type="button" class="btn border border-black border-2 fw-bold w-100" style="box-shadow:2px 2px black" href="/">KEMBALI</a>
                                </div>
                            </div>
                          @endguest
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app/login.js') }}" crossorigin="anonymous"></script>
</body>

</html>
