@extends('layout.app.main')

@section('konten-produk')
    <div class="card text-bg-dark rounded-0">
        <img src="{{ asset('assets/img/header.jpeg') }}" class="card-img img-fluid w-100" style="height: 15rem;" alt="...">
        <div class="dark-overlay"></div>
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <h1 class="card-title fw-bold display-4 custom-letter-spacing" style="color:#fff3cd;letter-spacing: 20px;text-shadow: -1px 1px 0 #000,
            1px 1px 0 #000,
            1px -1px 0 #000,
            -1px -1px 0 #000;">KERANJANG PESANAN</h1>
        </div>
    </div>
    @if (session()->has('suksesaddcartuser'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksesaddcartuser') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row p-4 bg-dark">
        <div class="col-md-9">
            <div class="card text-bg-warning bg-warning-subtle mb-3 fw-bold">
                <div class="card-header border-black border-bottom border-3 d-flex justify-content-between align-items-center ps-4 pe-4 m-0">
                    <h5 class="fw-bold text-uppercase"><strong>Shopping Cart</strong></h5>
                    <p>{{ $jumlah }} item</p>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between w-100 pe-2">
                        <div class="">
                            @if ($jumlah > 0)
                                <p class="fw-semibold">Anda memiliki {{ $jumlah }} item didalam Keranjang Pesanan Anda</p>
                            @else
                                <p class="fw-semibold">Anda tidak memiliki item didalam Keranjang Pesanan Anda</p>
                            @endif
                        </div>
                        <a href="{{ route('produk.all') }}" class="btn btn-dark btn-sm mb-3">Lanjut Belanja <i class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                    <div class="contaniner-fluid pe-2">
                        @php
                            $total = 0;
                        @endphp
                        @if ($jumlah == 0)
                            <div class="d-flex justify-content-center h-100 align-items-center">
                                <h4>Anda Belum Memasukkan Item ke dalam Keranjang</h4>
                            </div>
                        @else

                            @foreach ($data as $data)

                            @php
                                $total += $data->sub_total;
                            @endphp

                            <div class="keranjang row pe-2 mb-2">
                                <div class="baris-cart row d-flex align-items-center ms-2 rounded">
                                    <div class="col text-center py-1">
                                        <img src="{{ asset($data->paket->gambar) }}" class="img-fluid w-100" alt="">
                                    </div>
                                    <div class="col pt-2">
                                        <p>{{ $data->paket->name }}</p>
                                    </div>
                                    <div class="col text-center pt-2">
                                        <p>{{ $data->lama_langganan }} {{ substr($data->paket->periode->periode, 0, -2) }} Langganan</p>
                                    </div>
                                    <div class="col">
                                        <h5 class="text-center sub_total" id="sub_total"><small>Rp. {{ number_format($data->sub_total, 2, ',', '.') }}</small></h5>
                                    </div>
                                    <div class="col text-center">
                                        <button class="btn btn-outline-warning btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $data->id }}" aria-expanded="false" aria-controls="flush-collapseOne{{ $data->id }}"><i class="fa-solid fa-circle-info"></i> <small><strong>Detail</strong></small></button>
                                        <button class="btn btn-outline-dark btn-sm"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                                <div class="row ms-2 mt-2">
                                    <div class="accordion-item">
                                        <div id="flush-collapseOne{{ $data->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                          <div class="accordion-body row p-2 bg-dark d-flex rounded-bottom" style="color: #fff3cd">
                                            <div class="col d-flex text-center">
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Nama Penerbit</p>
                                                        <p class="fw-bold">{{ $data->paket->penerbit->name }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Kategori Produk</p>
                                                        <p class="fw-bold">{{ $data->paket->kategori_produk->name }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Periode Pengiriman</p>
                                                        <p class="fw-bold">{{ $data->paket->periode->periode }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Waktu Pengiriman</p>
                                                        <p class="fw-bold">{{ $data->paket->waktu_pengiriman }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Periode Pengiriman</p>
                                                        <p class="fw-bold">{{ \Carbon\Carbon::parse($data->start_langganan)->format('d M Y') }} - {{ \Carbon\Carbon::parse($data->end_langganan)->format('d M Y') }}</p>
                                                    </small>
                                                </div>
                                            </div>
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
        </div>
        <div class="col-md-3 fw-bold">
            <div class="card bg-warning-subtle mb-3 ">
                <div class="card-header border-black border-bottom border-3 mt-1">
                    <h5 class="fw-bold text-uppercase text-center"><strong>Checkout</strong></h5>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-uppsercase"><strong>{{ $jumlah }} Items</strong></h6>
                        <h6 class="text-uppsercase" id="confirmtotal1"><strong>Rp. {{ number_format($total, 2, ',', '.') }}</strong></h6>
                    </div>
                    <hr>
                  <p class="text-center"><small>Pilih Bank atau Dompet Digital Kami</small></p>
                  <div class="d-flex flex-wrap justify-content-center">
                    <div class="col-md-3 mx-1 flex-item mt-1">
                        <img src="{{ asset('assets/img/bayardana.jpeg') }}" class="img-fluid rounded" alt="" >
                    </div>
                    <div class="col-md-3 mx-1 flex-item mt-1">
                        <img src="{{ asset('assets/img/bayardana.jpeg') }}" class="img-fluid rounded" alt="" >
                    </div>
                    <div class="col-md-3 mx-1 flex-item mt-1">
                        <img src="{{ asset('assets/img/bayardana.jpeg') }}" class="img-fluid rounded" alt="" >
                    </div>
                    <div class="col-md-3 mx-1 flex-item mt-1">
                        <img src="{{ asset('assets/img/bayardana.jpeg') }}" class="img-fluid rounded" alt="" >
                    </div>
                  </div>
                  <div class="konfirm-rek mt-2">
                    <p class="text-center"><small>Silahkan Anda melakukan pembayaran melalui DANA kami</small></p>
                  <div class="row m-0">
                    <div class="col-md-6">
                        <p class="text-center mt-2"><small>Atas Nama</small></p>
                        <p class="text-center f-bold"><small>SONI INDRA MAULANA</small></p>
                    </div>
                    <div class="col-md-6">
                        <p class="text-center mt-2"><small>No. Rekening</small></p>
                        <p class="text-center f-bold"><small>7986 74183269 89749</small></p>
                    </div>
                  </div>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                      <p class="fw-bold text-uppercase">Total Bayar</p>
                      <p class="fw-bold" id="confirmtotal2">Rp. {{ number_format($total, 2, ',', '.') }}</p>
                  </div>
                  <button type="button" class="btn btn-dark text-uppercase w-100" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><strong>Checkout</strong></button>
                </div>
              </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-warning-subtle text-dark">
            <div class="modal-header">
            <h1 class="modal-title fs-5 fw-semibold text-uppercase" id="exampleModalLabel"><b>Konfirmasi Pembayaran</b></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex mb-2 fw-bold justify-content-center">
                    <div class="mx-2 text-center border-end border-black border-2 pe-3">
                        <p>Rekening</p>
                        <p>DANA</p>
                    </div>
                    <div class="mx-2 text-center">
                        <p>Atas Nama</p>
                        <p>SONI INDRA MAULANA</p>
                    </div>
                    <div class="mx-2 text-center border-start border-black border-2 ps-3">
                        <p>No. Rekening</p>
                        <p>096 7863876 700</p>
                    </div>
                </div>
                <div class="alert alert-primary" role="alert">
                    <i class="fa-solid fa-circle-info"></i> Sebelum melanjutkan ke pembayaran silahkan Anda dapat melakukan pembayaran terlebih dahulu ke dompet digital atau rekening bank kami diatas, lalu mengupload bukti pembayaran yang telah anda dibawah ini.
                </div>
                <form action="">
                    <label for="exampleFormControlInput1" class="form-label"><b>Upload Bukti Pembayaran</b></label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>
                </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let total = 0;
            const subTotals = document.querySelectorAll('.sub_total small');
            subTotals.forEach(function(subTotalElement) {
                const subTotalText = subTotalElement.textContent.replace('Rp. ', '').replace(/\./g, '').replace(',', '.');
                const subTotalValue = parseFloat(subTotalText);
                total += subTotalValue;
            });

            const formattedTotal = 'Rp. ' + new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2
            }).format(total).replace('IDR', '').trim();

            document.getElementById('confirmtotal1').innerHTML = `<strong>${formattedTotal}</strong>`;
            document.getElementById('confirmtotal2').innerHTML = formattedTotal;
        });

    </script>
@endsection
