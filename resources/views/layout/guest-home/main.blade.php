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
    {{-- bisa sampai sini buat header nya --}}
    <link rel="stylesheet" href="{{ asset('css/guest/navbar-guest.css') }}">
    <link rel="stylesheet" href="{{ asset('css/guest/main-guest.css') }}">

</head>

<body class="container-fluid m-0 p-0">

    @include('layout.guest-home.header')
    @yield('konten-guest')
    @include('layout.guest-home.footer')


    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app/script.js') }}" crossorigin="anonymous"></script>

    {{-- link dibawah bisa dihapus --}}
    <script src="{{ asset('js/guest/navbar.js') }}" crossorigin="anonymous"></script>
</body>

</html>
