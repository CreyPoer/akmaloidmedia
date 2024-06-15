@extends('layout.admin.main')
@section('title', 'AKMALOID | Penerbit')
@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Data Master</li>
            <li class="breadcrumb-item active" aria-current="page">Penerbit</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Edit Penerbit</h1>
    </div>
    <div class="card mb-4 bg-warning-subtle border-start border-black border-3">
        <div class="card-body">
            <form action="{{ route('update.penerbit', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputNamaPenerbit" class="form-label">Nama Penerbit</label>
                        <input type="text" class="form-control" id="InputNamaPenerbit" name="name"
                            placeholder="Nama Penerbit" value="{{ $data->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputFoto" class="form-label">Logo Penerbit <small>silahkan upload logo jika ingin merubah logo Penerbit</small></label><br>
                        <div class="input-group mb-3" id="inputLogo">
                            <input type="file" class="form-control" name="logo" id="inputLogo">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('logo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6 mb-3">
                        <label for="inputAlamat" class="form-label">Alamat Penerbit</label>
                        <textarea class="form-control" name="alamat" id="inputAlamat" rows="3">{{ $data->alamat}}</textarea>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="3">{{ $data->deskripsi }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold d-flex">
                    <div class="col">
                        <a type="button" href="{{ route('admin.penerbit') }}"
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
