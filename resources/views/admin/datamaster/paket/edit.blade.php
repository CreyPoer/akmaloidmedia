@extends('layout.admin.main')
@section('title', 'AKMALOID | Paket')
@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Master</li>
            <li class="breadcrumb-item active" aria-current="page">Paket</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Edit Paket</strong></h1>
    </div>


    <div class="card mb-4 bg-warning-subtle border-start border-black border-3">
        <div class="card-body">
            <form action="{{ route('update.paket',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputNama" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="InputNama" name="name"
                            placeholder="Nama Lengkap" value="{{ $data->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputFoto" class="form-label">Gambar <small>silahkan upload gambar jika ingin merubah gambar Paket</small></label><br>
                        <div class="input-group mb-3" id="inputGambar">
                            <input type="file" class="form-control" name="gambar" id="inputGambar">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('gambar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="inputWaktuPengiriman" class="form-label">Waktu Pengiriman</label>
                        <select class="form-select" id="inputWaktuPengiriman" name="waktu_pengiriman">
                            <option selected>Pilih Waktu Pengiriman</option>
                            <option {{ $data->waktu_pengiriman == 'Pagi' ? 'selected' : '' }} value="Pagi" >Pagi Hari</option>
                            <option {{ $data->waktu_pengiriman == 'Siang' ? 'selected' : '' }} value="Siang" >Siang Hari</option>
                            <option {{ $data->waktu_pengiriman == 'Sore' ? 'selected' : '' }} value="Sore" >Sore Hari</option>
                          </select>
                        @error('waktu_pengiriman')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputKategoriProduk" class="form-label">Kategori Produk</label>
                        <select class="form-select" id="inputKategoriProduk" name="kategori_produk_id">
                            <option selected>Pilih Kategori Produk</option>
                            @foreach($kategoriproduk as $kategori_produk)
                            <option value="{{ $kategori_produk->id }}" {{ $kategori_produk->id == $data->kategori_produk_id ? 'selected' : '' }}>
                                {{ $kategori_produk->name }}
                            </option>
                        @endforeach
                          </select>
                        @error('kategori_produk_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="inputPenerbit" class="form-label">Penerbit</label>
                        <select class="form-select" id="inputPenerbit" name="penerbit_id" aria-label="Default select example">
                            <option selected>Pilih Penerbit</option>
                            @foreach($penerbit as $penerbit)
                            <option value="{{ $penerbit->id }}" {{ $penerbit->id == $data->penerbit_id ? 'selected' : '' }}>
                                {{ $penerbit->name }}
                            </option>
                        @endforeach
                          </select>
                        @error('penerbit_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputPeriode" class="form-label">Periode</label>
                        <select class="form-select" id="inputPeriode" name="periode_id" aria-label="Default select example">
                            <option selected>Pilih Periode</option>
                            @foreach($periode as $periode)
                            <option value="{{ $periode->id }}" {{ $periode->id == $data->periode_id ? 'selected' : '' }}>
                                {{ $periode->periode }}
                            </option>
                        @endforeach
                          </select>
                        @error('periode_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row fw-bold">
                    <div class="col-md-12 mb-3">
                        <label for="inputHarga" class="form-label">Harga Paket</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="number" id="inputHarga" name="harga_paket" class="form-control" value="{{ $data->harga_paket }}" >
                            <span class="input-group-text">/ hari</span>
                          </div>
                        @error('harga_paket')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 fw-bold">
                    <div class="col-md-12 ">
                        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="3">{{ $data->deskripsi }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 fw-bold d-flex">
                    <div class="col">
                        <a type="button" href="{{ route('admin.paket') }}"
                            class="tombol-form btn border-start border-black border-2 text-black w-100"><strong
                                class="text-uppercase">Kembali</strong></a>
                    </div>
                    <div class="col">
                        <button type="submit"
                            class="tombol-form btn border-start border-black border-2 text-black w-100"><strong
                                class="text-uppercase">Simpan</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
