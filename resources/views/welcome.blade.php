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
    <nav class="navbar navbar-expand-lg sticky-top navbar-light p-3 shadow-sm navbar-default navbar-mobile">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-regular fa-newspaper me-2"></i>
                <strong>AKMALOID</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-expanded="false" aria-controls="navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <div class="ms-auto d-none d-lg-block">
                    <div class="row">
                    </div>
                </div>
                <ul class="navbar-nav ms-auto fw-bold">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#Home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#Product">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#About">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#Service">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#Contact">Contact</a>
                    </li>
                </ul>
                <hr>
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-uppercase" href="#"><i
                                class="fa-solid fa-cart-shopping me-1 fa-lg"></i><strong>Cart</strong>
                            <span class="badge bg-danger top-0 start-100 translate-middle ms-1">3</span></a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown-center">
                            <a class="nav-link mx-2 text-uppercase dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" href="#"><i class="fa-solid fa-circle-user me-1 fa-lg"></i>
                                <strong style="color:#fff3cd" class="log">Login</strong></a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-uppercase" href="#"><strong>My Profile</strong></a></li>
                                <hr>
                                <li><a class="dropdown-item text-uppercase" href="#"><strong>Logout</strong></a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid p-0" id="Home" style="margin-top: -5rem;">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('assets/img/download.jpeg') }}" class="img-fluid w-100" alt="..."
                        style="height: 41rem">
                    <div class="dark-overlay"></div>
                    <div class="carousel-caption text-start">
                        <div class="row px-2 container-fluid">
                            <div class="col-sm-6 align-items-center d-flex">
                                <div>
                                    <h1>Selamat datang di AKMALOID</h1>
                                    <h4>Aplikasi Pemesanan Koran, Majalah dan Tabloid</h4>
                                    <h6>Nikmati berbagai jenis Media Cetak terbaik di Indonesia yang sudah kami siapkan
                                        khusus untuk Anda</h6>
                                    <button class="btn btn-primary">
                                        <h5>Daftar Sekarang</h5>
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-6 mx-auto">
                                <img src="{{ asset('assets/img/slide1.png') }}" class="img-fluid" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets/img/download.jpeg') }}" class="img-fluid w-100" alt="..."
                        style="height: 41rem">
                    <div class="carousel-caption d-none d-md-block">
                        <h2>Second slide label</h2>
                        <h3>Some representative placeholder content for the second slide.</h3>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <div class="me-auto bg-black px-2 pb-3 pt-3 rounded-end-circle opacity-30">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </div>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <div class="ms-auto bg-black px-2 pb-3 pt-3 rounded-start-circle opacity-30">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </div>
            </button>
        </div>
    </div>
    <div class="container-fluid py-3 px-5 bg-warning-subtle pt-5" id="Product">
        <div class="text-left border-bottom border-warning border-5 text-black w-25 mt-4">
            <h2><strong>PRODUCT</strong></h2>
        </div>
        <div class="text-left">
            <blockquote class="blockquote pt-2">
                <p class="h6">Disini Anda akan menemukan banyak referensi Media Cetak yanng sudah kami persiapkan
                    dan dikemas menjadi beberapa kategori yaitu Surat Kabar, Majalah dan Tabloid. Tunggu apa lagi, mulai
                    berlangganan sekarang dan nikmati informasi terbaru setiap hari.</p>
            </blockquote>
        </div>
        <div class="row pt-3">
            <div class="col-lg-4 mb-3 mb-3">
                <div class="card produk text-bg-dark ">
                    <img src="{{ asset('assets/img/produkkoran.jpeg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="isi-card">
                            <div class="judul-produk border-bottom border-warning border-2">
                                <h5 class="card-title">Surat Kabar</h5>
                            </div>
                            <p class="card-text">Kami sudah menyiapkan banyak paket berlangganan surat kabar yang bisa
                                Anda pilih dan tentunya dari penerbit yang sudah populer di Indonesia </p>
                            <p class="card-text"><button class="btn btn-warning  text-white"><strong>Cari Tau
                                        Yuk</strong></button></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card produk text-bg-dark ">
                    <img src="{{ asset('assets/img/produkkoran.jpeg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="isi-card">
                            <div class="judul-produk border-bottom border-warning border-2">
                                <h5 class="card-title">Surat Kabar</h5>
                            </div>
                            <p class="card-text">Kami sudah menyiapkan banyak paket berlangganan surat kabar yang bisa
                                Anda pilih dan tentunya dari penerbit yang sudah populer di Indonesia </p>
                            <p class="card-text"><button class="btn btn-warning  text-white"><strong>Cari Tau
                                        Yuk</strong></button></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="card produk text-bg-dark ">
                    <img src="{{ asset('assets/img/produkkoran.jpeg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        <div class="isi-card">
                            <div class="judul-produk border-bottom border-warning border-2">
                                <h5 class="card-title">Surat Kabar</h5>
                            </div>
                            <p class="card-text">Kami sudah menyiapkan banyak paket berlangganan surat kabar yang bisa
                                Anda pilih dan tentunya dari penerbit yang sudah populer di Indonesia </p>
                            <p class="card-text"><button class="btn btn-warning  text-white"><strong>Cari Tau
                                        Yuk</strong></button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-2 border-bottom border-black border-2 text-black w-100">
            <h2 class="judulpenerbit text-warning"><strong>PENERBIT</strong></h2>
        </div>
        <div class="text-center">
            <blockquote class="blockquote pt-2">
                <p class="h6">Website ini juga di dukung oleh produk produk Media Cetak yang cukup laris di dunia
                    Cendekiawan atau Media Cetak. Tentu saja dari penerbit-penerbit yang cukup terkenal di Indonesia
                    khusus nya di Industri Media Cetak</p>
            </blockquote>
        </div>
        <div id="carouselExampleAutoplaying" class="carousel slide " data-bs-ride="carousel"
            style="margin-top:1rem;">
            <div class="d-flex justify-content-center">
                <div class="carousel-inner w-75">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            <div class="penerbit-item col-lg-2 mb-2">
                                <img src="{{ asset('assets/img/KOMPAS group.jpeg') }}" class="d-block w-100"
                                    alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <div class="bg-black rounded-circle pt-1 px-1">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </div>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <div class="bg-dark rounded-circle pt-1 px-1">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </div>
            </button>
        </div>
    </div>
    <div class="container-fluid py-3 px-5 bg-dark pt-5 pb-5" id="About">
        <div class="text-left border-bottom border-warning border-5 text-white w-25 mt-4">
            <h2><strong>ABOUT</strong></h2>
        </div>
        <div class="text-left">
            <blockquote class="blockquote pt-2">
                <p class="h6 text-white">Selamat datang di Website AKMALOID yaitu Aplikasi Pemesanan Koran, Majalah dan
                    Tabloid. Cari tau lebih banyak lagi yuk.</p>
            </blockquote>
        </div>
        <div class="row container-fluid mt-5 d-flex align-items-center">
            <div class="col-md-6 d-flex justify-content-center mb-2">
                <img src="{{ asset('assets/img/buatabout.png') }}"
                    class="zoom-out-img d-block w-90 border border-warning border-2 rounded bg-warning-sutble"
                    alt="...">
            </div>
            <div class="col-md-6">
                <div class="border border-warning border-2 p-1 rounded text-white">
                    <h2><strong>Selamat Datang di <span class="text-warning">AKMALOID</span></strong></h2>
                    <p class="fw-semibold">
                        Dengan misi untuk membawa informasi terkini dan terpercaya langsung ke genggaman Anda, kami
                        menyajikan berbagai pilihan koran, majalah, dan tabloid terbaik dari seluruh Indonesia.
                    </p>
                    <p class="fw-semibold">
                        Dengan dukungan tim profesional dan teknologi canggih, kami siap memberikan pengalaman
                        berlangganan yang tak terlupakan bagi Anda.
                        Bergabunglah dengan AKMALOID hari ini dan nikmati kemudahan dalam membaca koran, majalah, dan
                        tabloid favorit Anda.
                    </p>
                    <p class="fw-semibold">
                        Kami berkomitmen untuk menjadi mitra terpercaya Anda dalam memenuhi kebutuhan informasi Anda.
                        Terima kasih telah memilih AKMALOID sebagai tempat berlangganan media cetak Anda. Mari
                        bersama-sama menjelajahi dunia informasi yang menarik dan bermanfaat!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3 px-5 bg-warning-subtle pt-4 pb-5" id="Service">
        <div class="text-left border-bottom border-warning border-5 text-black w-25 mt-5">
            <h2><strong>SERVICE</strong></h2>
        </div>
        <div class="text-left">
            <blockquote class="blockquote pt-2">
                <p class="h6">Di Website ini kami sudah mempersiapkan layanan-layanan yang tentu saja mempermudah
                    Anda untuk melakukan pemesanan Media Cetak dan menikmati informasi atau berita dari Media Cetak.</p>
            </blockquote>
        </div>
        <div class="row pt-4">
            <div class="kardservis col-md-4">
                <div class="card mb-3 bg-warning-subtle shadow rounded border border-dark border-3">
                    <div class="tes row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center rounded-start mt-2">
                            <i class="icon-servis fa-solid fa-bag-shopping" style="font-size:100px;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="judul-servis card-title text-warning"><strong>Pemesanan Melalui
                                        Website</strong></h3>
                                <p class="isi-servis card-text fw-semibold">Kami menyediakan layanan untuk melakukan
                                    pemesanan Media Cetak secara Online melalui Website</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kardservis col-md-4">
                <div class="card mb-3 bg-warning-subtle shadow rounded border border-dark border-3">
                    <div class="tes row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center rounded-start mt-2">
                            <i class="icon-servis fa-solid fa-newspaper" style="font-size:100px;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="judul-servis card-title text-warning"><strong>Pemesanan Melalui
                                        Website</strong></h3>
                                <p class="isi-servis card-text fw-semibold">Kami menyediakan layanan untuk melakukan
                                    pemesanan Media Cetak secara Online melalui Website</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kardservis col-md-4">
                <div class="card mb-3 bg-warning-subtle shadow rounded border border-dark border-3">
                    <div class="tes row g-0">
                        <div class="col-md-4 d-flex align-items-center justify-content-center rounded-start mt-2">
                            <i class="icon-servis fa-solid fa-newspaper" style="font-size:100px;"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="judul-servis card-title text-warning"><strong>Pemesanan Melalui
                                        Website</strong></h3>
                                <p class="isi-servis card-text fw-semibold">Kami menyediakan layanan untuk melakukan
                                    pemesanan Media Cetak secara Online melalui Website</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-3 px-5 bg-dark pt-5 " id="Contact">
        <div class="text-left border-bottom border-warning border-5 text-white w-25 mt-4">
            <h2><strong>CONTACT</strong></h2>
        </div>
        <div class="text-left">
            <blockquote class="blockquote pt-2">
                <p class="h6 text-white">Silahkan jika Anda ingin menghubungi kami bisa menggunakan informasi-informasi
                    yang kami sediakan dibawah ini serta Saran dan Masukan dari Anda akan sangat membantu kami dalam
                    mengembangkan Website ini.</p>
            </blockquote>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="email row">
                    <div class="email2 card mb-3 border border-dark border-3 rounded-end">
                        <div class="row g-0">
                            <div
                                class="col-md-4 poin d-flex align-items-center justify-content-center border border-black rounded-5">
                                <i class="fa-solid fa-newspaper ikan" style="font-size:70px;"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title text-warning"><strong>Email Us</strong></h3>
                                    <p class="card-text isi-email fw-semibold"><strong>akmaloid@gmail.com</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email row">
                    <div class="email2 card mb-3 border border-dark border-3 rounded-end">
                        <div class="row g-0">
                            <div
                                class="col-md-4 poin d-flex align-items-center justify-content-center border border-black rounded-5">
                                <i class="fa-brands fa-whatsapp fa-xl ikan" style="font-size:70px;"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title text-warning"><strong>Phone Number</strong></h3>
                                    <p class="card-text isi-email fw-semibold"><strong>0863785354876</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email row">
                    <div class="email2 card mb-3 border border-dark border-3 rounded-end">
                        <div class="row g-0">
                            <div
                                class="col-md-4 poin d-flex align-items-center justify-content-center border border-black rounded-5">
                                <i class="fa-brands fa-instagram fa-xl ikan" style="font-size:70px;"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title text-warning"><strong>Instagram</strong></h3>
                                    <p class="card-text isi-email fw-semibold"><strong>@akmaloidstore</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="email row">
                    <div class="email2 card mb-3 border border-dark border-3 rounded-end">
                        <div class="row g-0">
                            <div
                                class="col-md-4 poin d-flex align-items-center justify-content-center border border-black rounded-5">
                                <i class="fa-brands fa-facebook fa-xl ikan" style="font-size:70px;"></i>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3 class="card-title text-warning"><strong>Facebook</strong></h3>
                                    <p class="card-text isi-email fw-semibold"><strong>Akmaloid Store</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8 bg-warning-subtle rounded p-4">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="inputName">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSubject" class="form-label fw-bold">Subject</label>
                        <input type="text" class="form-control" id="exampleInputSubject"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 mt-2"><strong>Submit</strong></button>
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-warning-subtle">
        <footer class="py-2 bg-warning-subtle">
            <hr>
            <div class="row px-5">
                <div class="col-6 col-md-3 mb-3">
                    <i class="fa-regular fa-newspaper" style="font-size: 150px;"></i>
                    <h2 class="text-warning" style="text-shadow: -1px 1px 0 #000,
                    1px 1px 0 #000,
                    1px -1px 0 #000,
                    -1px -1px 0 #000;"><strong>AKMALOID</strong></h2>
                    <p class=" text-body-secondary"><b>Aplikasi Pemesanan Koran, Majalah dan Tabloid</b></p>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <h2><b>Section</b></h2>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#Home" class="nav-link p-0 text-body-secondary">
                                <h5><strong>Home</strong></h5>
                            </a></li>
                        <li class="nav-item mb-2"><a href="#Product" class="nav-link p-0 text-body-secondary">
                                <h5><strong>Products</strong></h5>
                            </a></li>
                        <li class="nav-item mb-2"><a href="#About" class="nav-link p-0 text-body-secondary">
                                <h5><strong>About</strong>
                            </a></h5>
                        </li>
                        <li class="nav-item mb-2"><a href="#Service" class="nav-link p-0 text-body-secondary">
                                <h5><strong>Services</strong></h5>
                            </a></li>
                        <li class="nav-item mb-2"><a href="#Contact" class="nav-link p-0 text-body-secondary">
                                <h5><strong>Contact</strong></h5>
                            </a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <h2><b>Media Social</b></h2>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="#Home" class="nav-link p-0 text-body-secondary">
                                <h5> <i class="fa-brands fa-whatsapp fa-xl"></i> <strong>What's App</strong></h5>
                            </a></li>
                        <li class="nav-item mb-2"><a href="#Home" class="nav-link p-0 text-body-secondary">
                                <h5> <i class="fa-brands fa-instagram fa-xl"></i> <strong>Instagram</strong></h5>
                            </a></li>
                        <li class="nav-item mb-2"><a href="#Product" class="nav-link p-0 text-body-secondary">
                                <h5><i class="fa-brands fa-facebook fa-xl"></i> <strong>Facebook</strong></h5>
                            </a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 mb-3">
                    <h2><b>Alamat</b></h2>
                    <div class="row">
                        <div class="col-md-2">
                            <h1><i class="fa-solid fa-location-dot fa-lg" style="color:#212529;"></i></h1>
                        </div>
                        <div class="col-md-10">
                            <h5 class="text-body-secondary">
                                <b>Jl. KH Ach Marzuki GG 02 No 4, Lebak Pangeranan, Bangkalan, Jawa
                                    Timur</b>
                            </h5>
                        </div>
                    </div>
                </div>
        </footer>
    </div>

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
