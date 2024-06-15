@extends('layout.admin.main')
@section('title', 'AKMALOID | Slide Show')
@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slide Show</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Tambah Slide Show</strong></h1>
    </div>
    <div class="card mb-4 bg-warning-subtle border-start border-black border-3">
        <div class="card-body">
            <form action="{{ route('simpan.slideshow') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputJudul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="InputJudul" name="judul"
                            placeholder="Judul" value="{{ old('judul') }}">
                        @error('judul')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="InputSubJudul" class="form-label">Sub Judul</label>
                        <input type="text" class="form-control" id="InputSubJudul" name="sub_judul"
                            placeholder="Sub Judul" value="{{ old('sub_judul') }}">
                        @error('sub_judul')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-12">
                        <label for="InputButton" class="form-label">Tombol</label>
                        <input type="text" class="form-control" id="InputButton" name="button"
                        placeholder="Kata dalam Tombol" value="{{ old('button') }}">
                    @error('button')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="inputIcon" class="form-label">Icon</label><br>
                        <div class="input-group mb-3" id="inputIcon">
                            <input type="file" class="form-control" name="icon" id="inputIcon">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('icon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputGambar" class="form-label">Gambar</label><br>
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
                    <div class="col-md-12">
                        <label for="inputDeskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi" rows="3" >{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold d-flex">
                    <div class="col">
                        <a type="button" href="{{ route('admin.slideshow') }}" class="tombol-form btn border-start border-black border-2 text-black w-100"><strong class="text-uppercase">Kembali</strong></a>
                    </div>
                    <div class="col">
                        <button type="submit" class="tombol-form btn border-start border-black border-2 text-black w-100"><strong class="text-uppercase">Simpan</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('js/admin/script.js') }}"></script>
    @endpush
@endsection
