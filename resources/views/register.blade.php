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

<body class="d-flex flex-column container-fluid bg-dark justify-content-center align-items-center">

    <div class="row w-75">
        <div class="form-daftar col-md-6 bg-dark ps-3 pe-3 fw-bold rounded rounded-5 d-flex align-items-center text-white border border-warning-subtle border-3 rounded-4" style="box-shadow:3px 3px #fbe6a1">
            <div class="p-2">
                <div class="border border-warning-subtle border-3 rounded-bottom rounded-4 text-center p-2" style="box-shadow:3px 3px #fbe6a1">
                    <h2 class="fw-bold">SIGN UP</h2>
                    <small>Silahkan daftarkan diri Anda dengan mengisi data diri Anda dibawah</small>
                </div>
                @if (session()->has('suksesdaftar'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        {{ session('suksesdaftar') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="py-2">
                    <form action="{{ route('register') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="inputNama_Lengkap4" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="inputNama_Lengkap4" name="name" value="{{ old('name') }}" required>
                            <input type="hidden" class="form-control" id="inputRole" name="role" value="pelanggan">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputNoTelepon" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" id="inputNoTelepon" name="no_telepon" value="{{ old('no_telepon') }}" required>
                        @error('no_telepon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-6 password-container">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword" name="password" required>
                            <span class="password-toggle d-flex align-items-center pt-5 pe-2" id="tog2">
                                <p id="tertutup2"><i class="fas fa-eye-slash" style="color: black"></i></p>
                                <p id="terbuka2"><i class="fas fa-eye" style="color: black"></i></p>
                            </span>
                            @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputJenis_Kelamin" class="form-label">Jenis Kelamin</label>
                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group"
                                id="inputJenis_Kelamin">
                                <input type="radio" class="btn-check" name="gender" value="L" id="btnradio1"
                                    autocomplete="off" checked>
                                <label class="btn btn-outline-light fw-bold" for="btnradio1">Laki-laki</label>
                                <input type="radio" class="btn-check" name="gender" value="P" id="btnradio2"
                                    autocomplete="off">
                                <label class="btn btn-outline-warning fw-bold" for="btnradio2">Perempuan</label>
                            </div><br>
                            @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="inputFoto" class="form-label">Foto</label><br>
                            <div class="input-group mb-3" id="inputFoto">
                                <input type="file" class="form-control" name="foto" id="inputFoto" required>
                            </div>
                            @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="inputAddress" class="form-label">Alamat</label>
                            <textarea class="form-control" id="inputAddress" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                          <div class="mb-3">
                            <button type="submit" class="btn border border-warning-subtle border-2 fw-bold w-100 text-white" style="box-shadow:2px 2px #fbe6a1">DAFTAR</button>
                          </div>
                          @guest
                            <div class="mb-3">
                                <div class="d-flex gap-2 ">
                                    <a type="button" class="btn border border-warning-subtle border-2 fw-bold w-100 text-white" style="box-shadow:2px 2px #fbe6a1" href="/login">LOGIN</a>
                                    <a type="button" class="btn border border-warning-subtle border-2 fw-bold w-100 text-white" style="box-shadow:2px 2px #fbe6a1" href="/">KEMBALI</a>
                                </div>
                            </div>
                          @endguest
                    </form>
                </div>
            </div>
        </div>
        <div class="gambar-daftar col-md-6 d-flex align-content-center">
            <div class="border border-warning-subtle border-3 rounded-4 d-flex align-content-center" style="box-shadow:3px 3px #fbe6a1">
                <img src="{{ asset('assets/img/slide1.png') }}" class="img-fluid" alt="">
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
    <script src="{{ asset('js/app/register.js') }}" crossorigin="anonymous"></script>
</body>

</html>
