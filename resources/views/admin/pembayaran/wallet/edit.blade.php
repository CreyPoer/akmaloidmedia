@extends('layout.admin.main')
@section('title', 'AKMALOID | Wallet')
@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Pembayaran</li>
            <li class="breadcrumb-item active" aria-current="page">Wallet</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Edit Wallets</strong></h1>
    </div>

    <div class="card mb-4 bg-warning-subtle border-start border-black border-3">
        <div class="card-body">
            <form action="{{ route('update.wallet',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputEWallet" class="form-label">E-Wallet</label>
                        <input type="text" class="form-control" id="InputEWallet" name="e_wallet"
                            placeholder="E-Wallet" value="{{ $data->e_wallet }}">
                        @error('e_wallet')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="InputNamaRek" class="form-label">Nama Rekening</label>
                        <input type="text" class="form-control" id="InputNamaRek" name="nama_rek"
                            placeholder="Nama Rekening" value="{{ $data->nama_rek }}">
                        @error('nama_rek')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputNoRek" class="form-label">Nomer Rekening</label>
                        <input type="text" class="form-control" id="InputNoRek" name="no_rek"
                        placeholder="Nomer Rekening" value="{{ $data->no_rek }}">
                        @error('no_rek')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputGambar" class="form-label">Gambar <small>silahkan upload gambar jika ingin merubah gambar Wallet</small></label><br>
                        <div class="input-group mb-3" id="inputGambar">
                            <input type="file" class="form-control" name="gambar" id="inputGambar">
                            <label class="input-group-text" for="inputGroupFile02">Upload</label>
                        </div>
                        @error('gambar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold d-flex">
                    <div class="col">
                        <a type="button" href="{{ route('admin.wallet') }}" class="tombol-form btn border-start border-black border-2 text-black w-100"><strong class="text-uppercase">Kembali</strong></a>
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
