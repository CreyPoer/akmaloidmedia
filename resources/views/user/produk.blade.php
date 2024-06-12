@extends('layout.app.main')

@section('konten-produk')
    <div class="card text-bg-dark rounded-0">
        <img src="{{ asset('assets/img/header.jpeg') }}" class="card-img img-fluid w-100" style="height: 15rem;" alt="...">
        <div class="dark-overlay"></div>
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <h1 class="card-title fw-bold display-4 custom-letter-spacing" style="color:#fff3cd;letter-spacing: 20px;text-shadow: -1px 1px 0 #000,
            1px 1px 0 #000,
            1px -1px 0 #000,
            -1px -1px 0 #000;">PAKET PRODUK</h1>
        </div>
    </div>
    <div class="row p-5 bg-dark">
        <div class="col-md-3 p-3 bg-warning-subtle text-black rounded">
            <div class="border-bottom border-3 border-black">
                <h4><strong>Categories</strong></h4>
            </div>
            <div class="py-2">
                <form method="post" action="{{ route('check.produk') }}">
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
                    <a href="{{ route('produk.all') }}" class="btn btn-warning w-100 mt-2 fw-bold">Tampilkan Semua</a>
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
                        <a href="{{ route('produk.all') }}" class="btn btn-warning text-white fw-bold">Tampilkan Semua Paket</a>
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
                                        <p class="card-text fw-bold">Rp. {{ number_format($data->harga_paket, 2, ',', '.') }}
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
                                            <div class="container px-4 px-lg-5">
                                                <div class="row gx-4 gx-lg-5 align-items-center">
                                                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                                                            src="{{ asset($data->gambar) }}"
                                                            alt="..."></div>
                                                    <div class="col-md-6">
                                                        <h1 class="fw-bolder">{{ $data->name }}</h1>
                                                        <div class="fs-5 mb-2">
                                                            <span>Rp.  {{ number_format($data->harga_paket, 2, ',', '.') }}
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
                                                        <form action="{{ route('add.to.cart') }}" method="post">
                                                            @csrf
                                                            <div class="fs-6 mb-1">
                                                                <div class="row g-3">
                                                                    <div class="col-md-6">
                                                                        <label for="inputStartDate" class="form-label fw-bold">Awal Langganan</label>
                                                                        <input type="date" class="form-control" name="start_langganan" id="inputStartDate" required>
                                                                        <input type="hidden" class="form-control" name="paket_id" value="{{ $data->id }}" >
                                                                        <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}" >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="fs-6 mb-1" id="lamaLanggananContainer">
                                                                <div class="row g-3">
                                                                    <div class="col-md-12">
                                                                        <label for="InputLamaLangganan{{ $data->id }}" class="form-label fw-bold">Lama Langganan</label>
                                                                        <div class="input-group mb-3">
                                                                            <input type="number" class="form-control" name="lamalangganan" id="InputLamaLangganan{{ $data->id }}" min="1" aria-describedby="lamalangganan{{ $data->id }}" oninput="hitungTotalHarga('{{ $data->id }}', {{ $data->harga_paket }})" required>
                                                                            <span class="input-group-text" id="lamalangganan{{ $data->id }}">{{ substr($data->periode->periode, 0, -2) }}</span>
                                                                            <input type="hidden" name="langganan" value="{{ substr($data->periode->periode, 0, -2) }}">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row fs-6 mb-1">
                                                                <div class="col-md-6">
                                                                    <h6 class="fw-semibold">Total Harga</h6>
                                                                    <h4 class="fw-bold" id="totalHarga{{ $data->id }}" >Rp. 0</h4>
                                                                    <input type="hidden" name="sub_total" id="subTotal{{ $data->id }}">
                                                                </div>
                                                                <div class="col-md-6 d-flex align-items-center justify-content-end">
                                                                    <button type="submit" class="btn btn-warning fw-bold" title="Add to Cart">
                                                                        <i class="fa-solid fa-plus fa-lg"></i> Add To Cart
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>

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

    <script>
        function hitungTotalHarga(id, hargaPaket) {
            var jumlahLangganan = document.getElementById('InputLamaLangganan' + id).value;
            var totalHarga = jumlahLangganan * hargaPaket;
            document.getElementById('totalHarga' + id).innerText = "Rp. " + totalHarga.toLocaleString();
            document.getElementById('subTotal' + id).value = totalHarga;
        }
    </script>

@endsection
