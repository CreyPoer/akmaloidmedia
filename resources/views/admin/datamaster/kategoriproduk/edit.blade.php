@extends('layout.admin.main')
@section('title', 'AKMALOID | Kategori Produk')
@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Master</li>
            <li class="breadcrumb-item active" aria-current="page">Kategori Produk</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Edit Kategori Produk</strong></h1>
    </div>


    <div class="card mb-4 bg-warning-subtle border-start border-black border-3">
        <div class="card-body">
            <form action="{{ route('update.kategoriproduk', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputNamaLengkap" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="InputNamaLengkap" name="name"
                            placeholder="Nama Lengkap" value="{{ $data->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputFoto" class="form-label">Foto <small>silahkan upload foto jika ingin merubah foto Kategori Produk</small></label><br>
                        <div class="input-group mb-3" id="inputFoto">
                            <input type="file" class="form-control" name="foto" id="inputFoto">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('foto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-12 mb-3">
                        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="3">{{ $data->deskripsi }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold d-flex">
                    <div class="col">
                        <a type="button" href="{{ route('admin.kategoriproduk') }}"
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
