@extends('layout.app.main')

@section('konten-produk')
<div class="card text-bg-dark rounded-0">
    <img src="{{ asset('assets/img/header.jpeg') }}" class="card-img img-fluid w-100" style="height: 15rem;" alt="...">
    <div class="dark-overlay"></div>
    <div class="card-img-overlay d-flex justify-content-center align-items-center">
        <h1 class="card-title fw-bold display-4 custom-letter-spacing" style="color:#fff3cd;letter-spacing: 20px;text-shadow: -1px 1px 0 #000,
            1px 1px 0 #000,
            1px -1px 0 #000,
            -1px -1px 0 #000;">
            RIWAYAT PESANAN</h1>
    </div>
</div>
<div class="row p-5 bg-dark">
    <div class="col-md-4 bg-warning-subtle p-2 rounded">
        <div class="row text-center">
            <h5 class="text-uppercase"><strong>soni indra maulana</strong></h5>
            <div class="d-flex justify-content-center">
                <div class="row container-fluid w-100">
                    <div class="col-sm-4 border-bottom border-black mb-3 border-4"></div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2 text-uppercase">
                        <h6><strong>Soni</strong></h6>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 border-bottom border-black mb-3 border-4"></div>
                </div>
            </div>
            <div class="pt-2 mb-auto d-flex justify-content-center">
                <img src="{{ asset('assets/img/usertest.jpeg') }}" class="rounded-circle border border-black border-3" alt="...">
            </div>
        </div>
        <div class="row p-2 bg-dark rounded-top text-white mx-2 mt-1 d-flex justify-content-center text-center">
            <div class="border-bottom border-white border-2 my-1 w-75">
                <h5><i class="fa-regular fa-envelope"></i> <strong>email@gmail.com</strong></h5>
            </div>
            <div class="border-bottom border-white border-2 my-1 w-75">
                <h5><i class="fa-solid fa-square-phone"></i> <strong>0863633835839</strong></h5>
            </div>
        </div>
    </div>
    <div class="col-md-8 px-4 mb-2">
        <div class="card mt-1">
            <div class="card-header text-dark bg-warning-subtle">
                <h4><strong class="text-uppercase">History Pesanan</strong></h4>
            </div>
            <div class="card-body row bg-dark">
                <div class="keranjang row pe-2 mb-2 fw-bold">
                    <div class="baris-pesanan row d-flex align-items-center ms-2 rounded bg-dark" style="color: #fff3cd">
                        <div class="col text-center">
                            <img src="{{ asset('assets/img/slide1.png') }}" class="img-fluid w-100" alt="">
                        </div>
                        <div class="col pt-2">
                            <p>KOMPAS Koran</p>
                        </div>
                        <div class="col text-center pt-2">
                            <p>1 Bulan Langganan</p>
                        </div>
                        <div class="col">
                            <h5 class="text-center"><small>Rp. 100.000,00</small></h5>
                        </div>
                        <div class="col text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tanggal Pesan">
                            20 Mei 2024
                        </div>
                        <div class="col text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Pesanan">
                            <span class="badge text-bg-success">Aktif</span>
                        </div>
                        <div class="col text-center">
                            <button class="btn btn-outline-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne"><i class="fa-solid fa-circle-info"></i> <strong>Detail</strong></button>
                        </div>
                    </div>
                    <div class="row ms-2 mt-2">
                        <div class="accordion-item">
                            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body row pe-3 py-2 bg-dark d-flex rounded-bottom bg-warning-subtle" style="color: #212529">
                                    <div class="col d-flex text-center">
                                        <div class="col">
                                            <small>
                                                <p class="fw-medium">Nama Penerbit</p>
                                                <p class="fw-bold">KOMPAS Group</p>
                                            </small>
                                        </div>
                                        <div class="col">
                                            <small>
                                                <p class="fw-medium">Kategori Produk</p>
                                                <p class="fw-bold">Koran</p>
                                            </small>
                                        </div>
                                        <div class="col">
                                            <small>
                                                <p class="fw-medium">Periode Pengiriman</p>
                                                <p class="fw-bold">Harian (Setiap Hari)</p>
                                            </small>
                                        </div>
                                        <div class="col">
                                            <small>
                                                <p class="fw-medium">Waktu Pengiriman</p>
                                                <p class="fw-bold">Sore Hari</p>
                                            </small>
                                        </div>
                                        <div class="col">
                                            <small>
                                                <p class="fw-medium">Periode Pengiriman</p>
                                                <p class="fw-bold">1 Juni 2024 - 5 Juni 2024</p>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-warning-subtle text-center fw-bold">
                <small>Total Riwayat Pemesanan Anda</small>
                <h5 class="fw-bold">Rp.100.000,00</h5>
              </div>
        </div>
    </div>
</div>
@endsection
