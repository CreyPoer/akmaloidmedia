<style>
     .flex-item img.selected {
        border: 2px solid black; /* Ganti dengan gaya border yang diinginkan untuk menandai gambar terpilih */
    }
</style>
@extends('layout.app.main')

@section('konten-produk')
    <div class="card text-bg-dark rounded-0">
        <img src="{{ asset('assets/img/header.jpeg') }}" class="card-img img-fluid w-100" style="height: 15rem;" alt="...">
        <div class="dark-overlay"></div>
        <div class="card-img-overlay d-flex justify-content-center align-items-center">
            <h1 class="card-title fw-bold display-4 custom-letter-spacing"
                style="color:#fff3cd;letter-spacing: 20px;text-shadow: -1px 1px 0 #000,
            1px 1px 0 #000,
            1px -1px 0 #000,
            -1px -1px 0 #000;">
                KERANJANG PESANAN</h1>
        </div>
    </div>
    @if (session()->has('suksesaddcartuser'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksesaddcartuser') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('suksesdeletecart'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksesdeletecart') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row p-4 bg-dark">
        <div class="col-md-9">
            <div class="card text-bg-warning bg-warning-subtle mb-3 fw-bold">
                <div
                    class="card-header border-black border-bottom border-3 d-flex justify-content-between align-items-center ps-4 pe-4 m-0">
                    <h5 class="fw-bold text-uppercase"><strong>Shopping Cart</strong></h5>
                    <p>{{ $jumlah }} item</p>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between w-100 pe-2">
                        <div class="">
                            @if ($jumlah > 0)
                                <p class="fw-semibold">Anda memiliki {{ $jumlah }} item didalam Keranjang Pesanan Anda
                                </p>
                            @else
                                <p class="fw-semibold">Anda tidak memiliki item didalam Keranjang Pesanan Anda</p>
                            @endif
                        </div>
                        <a href="{{ route('produk.all') }}" class="btn btn-dark btn-sm mb-3">Lanjut Belanja <i
                                class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                    <div class="contaniner-fluid pe-2">
                        @php
                            $total = 0;
                        @endphp
                        @if ($jumlah == 0)
                            <div class="d-flex justify-content-center h-100 align-items-center">
                                <img src="{{ asset('assets/img/testnotfound.png') }}" alt="" class="w-50 img-fluid">
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
                                            <img src="{{ asset($data->paket->gambar) }}" class="img-fluid w-100"
                                                alt="">
                                        </div>
                                        <div class="col pt-2">
                                            <p>{{ $data->paket->name }}</p>
                                        </div>
                                        <div class="col text-center pt-2">
                                            <p>{{ $data->lama_langganan }}
                                                {{ substr($data->paket->periode->periode, 0, -2) }} Langganan</p>
                                        </div>
                                        <div class="col">
                                            <h5 class="text-center sub_total" id="sub_total"><small>Rp.
                                                    {{ number_format($data->sub_total, 2, ',', '.') }}</small></h5>
                                        </div>
                                        <div class="col text-center">
                                            <button class="btn btn-outline-warning btn-sm" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne{{ $data->id }}"
                                                aria-expanded="false"
                                                aria-controls="flush-collapseOne{{ $data->id }}"><i
                                                    class="fa-solid fa-circle-info"></i>
                                                <small><strong>Detail</strong></small></button>
                                            <button class="btn btn-outline-dark btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#KonfirmDeleteCart" data-id="{{ $data->id }}" data-user="{{ Auth::user()->id }}"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>


                                    </div>
                                    <div class="row ms-2 mt-2">
                                        <div class="accordion-item">
                                            <div id="flush-collapseOne{{ $data->id }}"
                                                class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body row p-2 bg-dark d-flex rounded-bottom"
                                                    style="color: #fff3cd">
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
                                                                <p class="fw-bold">
                                                                    {{ $data->paket->kategori_produk->name }}</p>
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
                                                                <p class="fw-medium">Total Pengiriman</p>
                                                                <p class="fw-bold">{{ $data->total_pengiriman }} kali</p>
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
                                                                <p class="fw-bold">
                                                                    {{ \Carbon\Carbon::parse($data->start_langganan)->format('d M Y') }}
                                                                    -
                                                                    {{ \Carbon\Carbon::parse($data->end_langganan)->format('d M Y') }}
                                                                </p>
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
                        <h6 class="text-uppsercase" id="confirmtotal1"><strong>Rp.
                                {{ number_format($total, 2, ',', '.') }}</strong></h6>
                    </div>
                    <hr>
                    <p class="text-center"><small>Pilih Bank atau Dompet Digital Kami</small></p>
                    <div class="d-flex flex-wrap justify-content-center">
                        @foreach ($wallets as $key => $wallet)
                        <div class="col-md-3 mx-1 flex-item ">
                            <img src="{{ asset($wallet->gambar) }}" class="img-fluid rounded"
                                alt="" onclick="updateWallet('{{ $wallet->id }}','{{ $wallet->e_wallet }}','{{ $wallet->nama_rek }}', '{{ $wallet->no_rek }}',{{ $key }})">
                        </div>
                        @endforeach
                        {{-- <div class="col-md-3 mx-1 flex-item mt-1">
                            <img src="{{ asset('assets/img/bayardana.jpeg') }}" class="img-fluid rounded" alt="">
                        </div> --}}
                    </div>
                    <div class="konfirm-rek mt-2">
                        <p class="text-center"><small>Silahkan Anda melakukan pembayaran melalui <strong id="walletEwallet"></strong> kami</small></p>
                        <div class="row m-0">
                            <div class="col-md-6">
                                <p class="text-center mt-2"><small>Atas Nama</small></p>
                                <p class="text-center f-bold" id="walletName"><small>Default Name</small></p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-center mt-2"><small>No. Rekening</small></p>
                                <p class="text-center f-bold" id="walletNumber"><small>Default Rek</small></p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p class="fw-bold text-uppercase">Total Bayar</p>
                        <p class="fw-bold" id="confirmtotal2">Rp. {{ number_format($total, 2, ',', '.') }}</p>
                    </div>
                    @if ($pemesanan_id != 0)
                        <button type="button" class="btn btn-dark text-uppercase w-100" class="btn btn-primary"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"><strong>Checkout</strong></button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}

    <div class="modal fade" id="KonfirmDeleteCart" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-warning-subtle text-dark">
                <form action="{{ url('/pelanggan/delete-cart') }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold text-uppercase fs-5">Konfirmasi Hapus Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="user_id" id="user">
                        <p class="fw-semibold">Anda yakin ingin menghapus Data Keranjang Anda</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-warning-subtle text-dark">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-semibold text-uppercase" id="exampleModalLabel"><b>Konfirmasi
                            Pembayaran</b></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex mb-2 fw-bold justify-content-center">
                        <div class="mx-2 text-center border-end border-black border-2 pe-3">
                            <p>Rekening</p>
                            <p id="walletEwalletmodal"></p>
                        </div>
                        <div class="mx-2 text-center">
                            <p>Atas Nama</p>
                            <p id="walletNamemodal"></p>
                        </div>
                        <div class="mx-2 text-center border-start border-black border-2 ps-3">
                            <p>No. Rekening</p>
                            <p id="walletNumbermodal"></p>
                        </div>
                    </div>
                    <div class="alert alert-primary" role="alert">
                        <i class="fa-solid fa-circle-info"></i> Sebelum melanjutkan ke pembayaran silahkan Anda dapat
                        melakukan pembayaran terlebih dahulu ke dompet digital atau rekening bank kami diatas, lalu
                        mengupload bukti pembayaran yang telah anda dibawah ini.
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <p class="fw-bold text-end">Total Bayar</p>
                        </div>
                        <div class="col-md-6">
                            <p class="fw-bold" id="confirmtotal3"></p>
                        </div>
                    </div>
                    <form action="{{ route('pesan.paket') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="total_biaya" id="total_biaya">
                        <input type="hidden" name="wallet_id" id="wallet_id">
                        <input type="hidden" name="pemesanan_id" value="{{ $pemesanan_id }}">
                        <label for="exampleFormControlInput1" class="form-label"><b>Upload Bukti Pembayaran</b></label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="bukti_bayar" id="inputGroupFile02" required>
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning fw-bold">Bayar</button>
            </div>
        </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var modalElement = document.getElementById('KonfirmDeleteCart');
            modalElement.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var id = button.getAttribute('data-id');
                var user = button.getAttribute('data-user');

                var modal = this;
                modal.querySelector('.modal-body #id').value = id;
                modal.querySelector('.modal-body #user').value = user;
            });
        });

        function updateWallet(id,ewallet,name, number, index) {
            document.getElementById('wallet_id').value = id;
            document.getElementById('walletEwallet').textContent = ewallet;
            document.getElementById('walletEwalletmodal').textContent = ewallet;
            document.getElementById('walletName').textContent = name;
            document.getElementById('walletNamemodal').textContent = name;
            document.getElementById('walletNumber').textContent = number;
            document.getElementById('walletNumbermodal').textContent = number;

            // Menambahkan kelas 'selected' untuk gambar yang dipilih
            const images = document.querySelectorAll('.flex-item img');
            images.forEach((img, idx) => {
                if (idx === index) {
                    img.classList.add('selected');
                } else {
                    img.classList.remove('selected');
                }
            });
        }
        updateWallet('{{ $wallets[0]->id }}','{{ $wallets[0]->e_wallet }}','{{ $wallets[0]->nama_rek }}', '{{ $wallets[0]->no_rek }}', 0);

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

            document.getElementById('confirmtotal1').innerHTML = `<strong>${formattedTotal}</strong>`;
            document.getElementById('confirmtotal2').innerHTML = formattedTotal;
            document.getElementById("confirmtotal3").innerHTML = `<strong>${formattedTotal}</strong>`;
            document.getElementById('total_biaya').value = total;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateTotal();
        });



    </script>
@endsection
