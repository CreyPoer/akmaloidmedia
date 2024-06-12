@extends('layout.app.main')

@section('konten-produk')
    <div class="card text-bg-dark rounded-0">
        <img src="{{ asset('assets/img/header.jpeg') }}" class="card-img img-fluid w-100" style="height: 15rem;" alt="...">
        <div class="dark-overlay"></div>
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <h1 class="card-title fw-bold display-4 custom-letter-spacing"
                style="color:#fff3cd;letter-spacing: 15px;text-shadow: -1px 1px 0 #000,
            1px 1px 0 #000,
            1px -1px 0 #000,
            -1px -1px 0 #000;">
                PAKET PRODUK</h1>
        </div>
    </div>
    <div class="row p-5 bg-dark">
        <div class="col-md-3 p-3 bg-warning-subtle text-black rounded">
            <div class="border-bottom border-3 border-black">
                <h4><strong>Categories</strong></h4>
            </div>
            <div class="py-2">
                <form method="post" action="{{ route('check.paket') }}">
                    @csrf
                    <div class="mb-2 border-bottom border-black border-2">
                        <label for="exampleInputEmail1" class="form-label"><strong>Kategori Produk</strong></label>
                        <div class="mb-3">
                        @foreach($kategoriproduk as $kategoriproduk)
                            <labe class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="kategori_produk_id[]" value="{{ $kategoriproduk->id }}"
                                {{ in_array($kategoriproduk->id, request()->get('kategori_produk_id', [])) ? 'checked' : '' }}>
                                {{ $kategoriproduk->name }}
                            </label><br>
                        @endforeach
                        </div>
                    </div>
                    <div class="mb-2 border-bottom border-black border-2">
                        <label for="exampleInputEmail1" class="form-label"><strong>Penerbit</strong></label>
                        <div class="mb-3">
                        @foreach($penerbit as $penerbit)
                            <labe class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="penerbit_id[]" value="{{ $penerbit->id }}"
                                {{ in_array($penerbit->id, request()->get('penerbit_id', [])) ? 'checked' : '' }}>
                                {{ $penerbit->name }}
                            </label><br>
                        @endforeach
                        </div>
                    </div>
                    <div class="mb-2 border-bottom border-black border-2">
                        <label for="exampleInputEmail1" class="form-label"><strong>Periode Berlangganan</strong></label>
                        <div class="mb-3">
                            @foreach($periode as $periode)
                            <labe class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="periode_id[]" value="{{ $periode->id }}"
                                {{ in_array($periode->id, request()->get('periode_id', [])) ? 'checked' : '' }}>
                                {{ $periode->periode }}
                            </label><br>
                        @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 mt-2 fw-bold">Submit</button>
                    <a href="{{ route('paket.all') }}" class="btn btn-warning w-100 mt-2 fw-bold">Tampilkan Semua</a>
                </form>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row px-2">

                @if ($data->isEmpty())
                <div class="h-100">
                    <div class="row">
                        <h2 class="text-white text-center">Tidak ada Paket yang ditemukan.</h2>
                        </div>
                    <div class="row justify-content-center">
                        <img src="{{ asset('assets/img/testnotfound.png') }}" alt="" class="w-50 img-fluid">
                        <a href="{{ route('paket.all') }}" class="btn btn-warning text-white fw-bold">Tampilkan Semua Paket</a>
                    </div>
                </div>
                @else
                    @foreach ($data as $data)
                        <div class="col-md-4">
                            <div class="card produk text-bg-dark mb-3">
                                <img src="{{ asset($data->gambar) }}" class="card-img" alt="...">
                                <div class="overlay-produk card-img-overlay">
                                    <div class="isi-card">
                                        <div class="judul-produk border-bottom border-warning border-2">
                                            <h5 class="card-title">{{ $data->name }}</h5>
                                        </div>
                                        <p class="card-text fw-bold">{{ number_format($data->harga_paket, 2, ',', '.') }}
                                            <small>/ pengiriman</small></p>
                                        <p class="card-text"><button class="btn btn-outline-warning text-white"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModal{{ $data->id }}"><strong>DETAIL</strong></button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg ">
                                    <div class="modal-content bg-warning-subtle">
                                        <div class="modal-header border-bottom border-black">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel{{ $data->id }}">Detail
                                                Paket</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-danger alert-dismissible" role="alert">
                                               <small> Anda tidak dapat Melakukan Pemesanan sebelum anda masuk kedalam system, Silahkan <a href="/login" class="alert-link">Login</a> terlebih dahulu</small>
                                            </div>
                                            <div class="container px-4 px-lg-5">
                                                <div class="row gx-4 gx-lg-5 align-items-center">
                                                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                                            src="https://dummyimage.com/500x600/dee2e6/6c757d.jpg"
                                                            alt="..."></div>
                                                    <div class="col-md-6">
                                                        <h1 class="fw-bolder">{{ $data->name }}</h1>
                                                        <div class="fs-5 mb-2">
                                                            <span>{{ number_format($data->harga_paket, 2, ',', '.') }}
                                                                <small>/ pengiriman</small></span>
                                                        </div>
                                                        <div class="fs-6 mb-1">
                                                            <span><strong>Penerbit</strong> <br>
                                                                {{ $data->penerbit->name }}</span>
                                                        </div>
                                                        <div class="fs-6 mb-1">
                                                            <span><strong>Periode Berlanggan</strong> <br>
                                                                {{ $data->periode->periode }}
                                                                ({{ $data->periode->deskripsi }})</span>
                                                        </div>
                                                        <div class="fs-6 mb-1">
                                                            <span><strong>Waktu Pengiriman</strong> <br>
                                                                {{ $data->waktu_pengiriman }}</span>
                                                        </div>
                                                        <div class="fs-6">
                                                            <a class="btn btn-danger w-100 my-2" href="/login"
                                                                type="button" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" data-bs-title="Login">
                                                                Login
                                                        </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-black border-bottom">
                                            <button type="button" class="btn btn-dark "
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
