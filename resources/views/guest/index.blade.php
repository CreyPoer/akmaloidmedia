@extends('layout.guest-home.main')

@section('konten-guest')
<div class="container-fluid p-0" id="Home" style="margin-top: -5rem;">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner ">
            @foreach ($slideshow as $index => $slide)
            <div class="carousel-item @if ($index === 0) active @endif">
                <img src="{{ asset($slide->gambar) }}" class="img-fluid w-100 mb-auto" alt="..." style="height: 46rem">
                <div class="dark-overlay"></div>
                <div class="carousel-caption text-start mb-5">
                    <div class="row px-2 container-fluid mb-3">
                        <div class="col-sm-6 align-items-center d-flex">
                            <div>
                                <h1>{{ $slide->judul }}</h1>
                                <h4>{{ $slide->sub_judul }}</h4>
                                <h6>{{ $slide->deskripsi }}</h6>
                                <button class="btn btn-primary">
                                    <h5>{{ $slide->button }}</h5>
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-6 mx-auto">
                            <img src="{{ asset($slide->icon) }}" class="img-fluid" alt="...">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <div class="me-auto bg-black px-2 pb-3 pt-3 rounded-end-circle opacity-30">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </div>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <div class="ms-auto bg-black px-2 pb-3 pt-3 rounded-start-circle opacity-30">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </div>
        </button>
    </div>
</div>
@if (session()->has('suksesguestfeedback'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('suksesguestfeedback') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
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
        @foreach ($kategoriproduk as $kategoriproduk)

            <div class="col-lg-4 mb-3 mb-3">
                <div class="card produk text-bg-dark">
                    <img src="{{ asset($kategoriproduk->foto) }}" class="card-img" alt="..." style="height: 18rem;">
                    <div class="card-img-overlay">
                        <div class="isi-card">
                            <div class="judul-produk border-bottom border-warning border-2">
                                <h5 class="card-title">{{ $kategoriproduk->name }}</h5>
                            </div>
                            <p class="card-text">{{ $kategoriproduk->deskripsi }}</p>
                            <p class="card-text"><a class="btn btn-warning text-white" href="{{ route('kategori.produk',$kategoriproduk->id) }}"><strong>Cari Tau
                                        Yuk</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>

      @endforeach

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

                @foreach($penerbit->chunk(6) as $key => $chunk)
                <div class="carousel-item @if($key == 0) active @endif">
                    <div class="row">
                        @foreach($chunk as $item)
                            <div class="penerbit-item col-lg-2 mb-2">
                                <a href="{{ route('penerbit',$item->id) }}">
                                    <img src="{{ asset($item->logo) }}" class="d-block w-100" alt="...">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

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

    <div class="d-flex justify-content-center pt-4 border-bottom border-black border-2 text-black w-100">
        <h2 class="judulpenerbit text-warning"><strong>PAKET</strong></h2>
    </div>
    <div class="text-center">
        <blockquote class="blockquote pt-2">
            <p class="h6">Produk yang di tawarkan dalam website ini juga sudah berupa paket paket langganan yang tentu saja banyak pilihannya</p>
        </blockquote>
    </div>
    <div class="row pt-2">
        @foreach ($paket as $paket)

        <div class="col-md-4">
            <div class="card produk text-bg-dark">
                <img src="{{ asset($paket->gambar) }}" class="card-img" alt="...">
                <div class="overlay-produk card-img-overlay">
                    <div class="isi-card">
                        <div class="judul-produk border-bottom border-warning border-2">
                            <h5 class="card-title">{{ $paket->name }}</h5>
                        </div>
                        <p class="card-text fw-bold">
                            Rp. {{ number_format($paket->harga_paket, 2, ',', '.') }} <small>/ pengiriman</small>
                        </p>
                        <p class="card-text">
                            <a class="btn btn-warning text-white" href="{{ route('paket.all') }}"><strong>SELENGKAPNYA</strong> <i class="fa-solid fa-circle-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>

    <div class="d-flex justify-content-center mt-3">
        <a class="btn btn-dark btn-lg rounded-5 d-flex align-items-center gap-2" href="{{ route('paket.all') }}"><strong class="fw-bold">SELENGKAPNYA</strong><i class="fa-solid fa-circle-arrow-right"></i></a>
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
                        <i class="icon-servis fa-solid fa-person-biking" style="font-size:100px;"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="judul-servis card-title text-warning"><strong>Menyediakan Jasa Pengiriman</strong></h3>
                            <p class="isi-servis card-text fw-semibold">Kami menyediakan layanan untuk
                                pengiriman Media Cetak yang sudah termasuk dengan harga paket langganan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="kardservis col-md-4">
            <div class="card mb-3 bg-warning-subtle shadow rounded border border-dark border-3">
                <div class="tes row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center rounded-start mt-2">
                        <i class="icon-servis fa-solid fa-boxes-stacked" style="font-size:100px;"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="judul-servis card-title text-warning"><strong>Tersedia Paket Langganan</strong></h3>
                            <p class="isi-servis card-text fw-semibold">Kami menyediakan paket-paket untuk pelanggan berlangganan yang sangat menarik untuk di coba</p>
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
                                <h3 class="card-title text-warning"><strong>Email</strong></h3>
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
            <form action="{{ route('guest.feedback') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="inputName" class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" id="inputName">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail4">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputSubject" class="form-label fw-bold">Subject</label>
                    <input type="text" name="subject" class="form-control" id="exampleInputSubject"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label fw-bold">Message</label>
                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-warning w-100 mt-2"><strong>Submit</strong></button>
            </form>
        </div>
    </div>
</div>
@endsection
