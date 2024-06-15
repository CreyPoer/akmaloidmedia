@extends('layout.admin.main')
@section('title', 'AKMALOID | Pemesanan')
@section('konten-admin')
    <div class="row d-flex justify-content-left" >
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Detail Pemesanan</strong></h1>
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><small class="fw-bold">Kode Pesanan : {{ $id }}</small></h1>
    </div>

    <div class="row main">
        @foreach ($detailpemesanan as $detail)

        <div class="col-md-6">
            <div class="card mb-3 shadow mb-5 bg-body-tertiary rounded">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($detail->paket->gambar) }}" class="card-img-top w-100" alt="...">
                    </div>
                    <div class="col-md-6 p-3">
                        <small class="fw-bold">Paket</small>
                        <h5 class="fw-bold">
                            {{ $detail->paket->name }}
                        </h5>
                        <small class="fw-bold">Kategori Produk</small>
                        <h5 class="fw-bold">
                            {{ $detail->paket->kategori_produk->name }}
                        </h5>
                        <small class="fw-bold">Penerbit</small>
                        <h5 class="fw-bold">
                            {{ $detail->paket->penerbit->name }}
                        </h5>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <small class="fw-bold">Periode</small>
                        <h5 class="fw-bold">
                            {{ $detail->paket->periode->periode }}
                        </h5>

                        <small class="fw-bold">Waktu Pengiriman</small>
                        <h5 class="fw-bold">
                            {{ $detail->paket->waktu_pengiriman }} Hari
                        </h5>

                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="fw-bold">Awal Langganan</small>
                                <h5 class="fw-bold">
                                    {{ \Carbon\Carbon::parse($detail->start_langganan)->format('d M Y') }}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <small class="fw-bold">Akhir Langganan</small>
                                <h5 class="fw-bold">
                                    {{ \Carbon\Carbon::parse($detail->end_langganan)->format('d M Y') }}
                                </h5>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <small class="fw-bold">Lama Langganan</small>
                                <h5 class="fw-bold">
                                    {{ $detail->lama_langganan}}  {{ substr($detail->paket->periode->periode, 0, -2) }}
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <small class="fw-bold">Total Pengiriman</small>
                                <h5 class="fw-bold">
                                    {{ $detail->total_pengiriman}} kali
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer text-center bg-dark text-white">
                    <small class="fw-bold">Sub Total</small>
                        <h5 class="fw-bold">
                            {{ number_format($detail->sub_total, 2, ',', '.') }}
                        </h5>
                  </div>
              </div>
        </div>

        @endforeach
    </div>




    <div class="col mb-3">
        <a type="button" href="{{ route('admin.pemesanan') }}" class="tombol-form btn border-start border-black border-2 text-black w-100"><strong class="text-uppercase">Kembali</strong></a>
    </div>

@endsection
