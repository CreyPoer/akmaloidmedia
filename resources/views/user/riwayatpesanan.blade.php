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
@if (session()->has('suksespesanpaket'))
<div class="alert alert-success alert-dismissible" role="alert">
    {{ session('suksespesanpaket') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="row p-5 bg-dark">
    <div class="col-md-4 bg-warning-subtle p-2 rounded">
        <div class="row text-center">
            <h5 class="text-uppercase"><strong>{{ $user->name }}</strong></h5>
            <div class="d-flex justify-content-center">
                <div class="row container-fluid w-100">
                    <div class="col-sm-4 border-bottom border-black mb-3 border-4"></div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2 text-uppercase">
                        <h6><strong>{{ $nickname2 }}</strong></h6>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-4 border-bottom border-black mb-3 border-4"></div>
                </div>
            </div>
            <div class="pt-2 mb-auto d-flex justify-content-center">
                <img src="{{ asset($user->foto) }}" class="rounded-circle border border-black border-3 w-100" alt="...">
            </div>
        </div>
        <div class="row p-2 bg-dark rounded-top text-white mx-2 mt-1 d-flex justify-content-center text-center">
            <div class="border-bottom border-white border-2 my-1 w-75">
                <h5><i class="fa-regular fa-envelope"></i> <strong><small>{{ $user->email }}</small></strong></h5>
            </div>
            <div class="border-bottom border-white border-2 my-1 w-75">
                <h5><i class="fa-solid fa-square-phone"></i> <strong>{{ $user->no_telepon }}</strong></h5>
            </div>
        </div>
    </div>
    <div class="col-md-8 px-4 mb-2">
        <div class="card mt-1">
            <div class="card-header text-dark bg-warning-subtle">
                <h4><strong class="text-uppercase">History Pesanan</strong></h4>
            </div>
            <div class="card-body row bg-dark">
                @if ($jumlah == 0)
                    <div class="d-flex justify-content-center text-white align-items-center">
                        <img src="{{ asset('assets/img/testnotfound.png') }}" alt="" class="w-50 img-fluid">
                        <h3>Maaf, Anda Belum Melakukan Pemesanan Paket</h3>
                    </div>
                @endif
                @php
                    $total = 0;
                @endphp
                @foreach ($riwayatpesanan as $pemesanan)
                @php
                    $tanggal_pesan = $pemesanan->tanggal_pemesanan;
                    $status_pemesanan = $pemesanan->status_pemesanan;
                @endphp
                    @foreach ($pemesanan->detailPemesanans as $detail)
                    @php
                        $total += $detail->sub_total;
                    @endphp

                        <div class="keranjang row pe-2 mb-2 fw-bold">
                            <div class="baris-pesanan row d-flex align-items-center ms-2 rounded bg-dark" style="color: #fff3cd">
                                <div class="col text-center">
                                    <img src="{{ asset($detail->paket->gambar) }}" class="img-fluid w-100" alt="">
                                </div>
                                <div class="col pt-2">
                                    <p>{{ $detail->paket->name }}</p>
                                </div>
                                <div class="col text-center pt-2">
                                    <p>{{ $detail->lama_langganan }} {{ substr($detail->paket->periode->periode, 0, -2) }} Langganan</p>
                                </div>
                                <div class="col">
                                    <h5 class="text-center sub_total" id="sub_total"><small>Rp. {{ number_format($detail->sub_total, 2, ',', '.') }}</small></h5>
                                </div>
                                <div class="col text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tanggal Pesan">
                                    {{ \Carbon\Carbon::parse($tanggal_pesan)->format('d M Y') }}
                                </div>
                                <div class="col text-center" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Status Pesanan">
                                    @if($status_pemesanan == "Menunggu Konfirmasi")
                                        <span class="badge text-bg-warning">  {{ $status_pemesanan }}</span>
                                    @else
                                        <span class="badge text-bg-success">  {{ $status_pemesanan }}</span>
                                    @endif
                                </div>
                                <div class="col text-center">
                                    <button class="btn btn-outline-warning" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $detail->id }}" aria-expanded="false" aria-controls="flush-collapseOne{{ $detail->id }}"><i class="fa-solid fa-circle-info"></i> <strong>Detail</strong></button>
                                </div>
                            </div>
                            <div class="row ms-2 mt-2">
                                <div class="accordion-item">
                                    <div id="flush-collapseOne{{ $detail->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body row pe-3 py-2 bg-dark d-flex rounded-bottom bg-warning-subtle" style="color: #212529">
                                            <div class="col d-flex text-center">
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Nama Penerbit</p>
                                                        <p class="fw-bold">{{ $detail->paket->penerbit->name }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Kategori Produk</p>
                                                        <p class="fw-bold">{{ $detail->paket->kategori_produk->name }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Periode Pengiriman</p>
                                                        <p class="fw-bold">{{ $detail->paket->periode->periode }} ({{ $detail->paket->periode->deskripsi }})</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Waktu Pengiriman</p>
                                                        <p class="fw-bold">{{ $detail->paket->waktu_pengiriman }}</p>
                                                    </small>
                                                </div>
                                                <div class="col">
                                                    <small>
                                                        <p class="fw-medium">Periode Pengiriman</p>
                                                        <p class="fw-bold">{{ \Carbon\Carbon::parse($detail->start_langganan)->format('d M Y') }} - {{ \Carbon\Carbon::parse($detail->end_langganan)->format('d M Y') }}</p>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endforeach
            </div>
            <div class="card-footer bg-warning-subtle text-center fw-bold">
                <small>Total Riwayat Pemesanan Anda</small>
                <h5 class="fw-bold" id="totalbiayapesanan">Rp.100.000,00</h5>
              </div>
        </div>
    </div>
</div>

<script>
     function updateTotal() {
            let total = 0;
            const subTotals = document.querySelectorAll('.sub_total small');
            subTotals.forEach(function(subTotalElement) {
                // Membersihkan teks dari elemen
                let subTotalText = subTotalElement.textContent.trim();

                // Menghapus semua karakter non-angka kecuali koma dan titik
                subTotalText = subTotalText.replace(/[^0-9,]/g, '').replace(',', '.');

                // Konversi ke angka
                const subTotalValue = parseFloat(subTotalText);

                if (!isNaN(subTotalValue)) {
                    total += subTotalValue;
                }
            });
            const formattedTotal = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 2
            }).format(total).replace('IDR', '').trim();

            document.getElementById('totalbiayapesanan').innerHTML = `<strong>${formattedTotal}</strong>`;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTotal();
        });


</script>

@endsection
