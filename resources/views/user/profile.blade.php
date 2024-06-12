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
                PROFILE</h1>
        </div>
    </div>
    @if (session()->has('sukseseditpelanggan'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('sukseseditpelanggan') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row p-5 bg-dark">
        <div class="col-md-4 bg-warning-subtle p-2 rounded">
            <div class="row text-center">
                <h5 class="text-uppercase"><strong>{{ $data->name }}</strong></h5>
                <div class="d-flex justify-content-center">
                    <div class="row container-fluid w-100">
                        <div class="col-sm-4 border-bottom border-black mb-3 border-4"></div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2 text-uppercase d-flex -justify-content-center">
                            <h6><small><strong>{{ $nickname }}</strong></small></h6>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4 border-bottom border-black mb-3 border-4"></div>
                    </div>
                </div>
                <div class="pt-2 mb-auto d-flex justify-content-center px-5 py-2">
                    <img src="{{ asset($data->foto) }}" class="rounded-circle border border-black border-3 w-100"
                        alt="...">
                </div>
            </div>
            <div class="row p-2 bg-dark rounded-top text-white mx-2 mt-1 d-flex justify-content-center text-center">
                <div class="border-bottom border-white border-2 my-1 w-75">
                    <h5><i class="fa-regular fa-envelope"></i> <strong>{{ $data->email }}</strong></h5>
                </div>
                <div class="border-bottom border-white border-2 my-1 w-75">
                    <h5><i class="fa-solid fa-square-phone"></i> <strong>{{ $data->no_telepon }}</strong></h5>
                </div>
            </div>
        </div>
        <div class="col-md-8 px-4 mb-2">
            <div class="card text-dark bg-warning-subtle mt-1">
                <div class="card-header border-bottom border-dark border-5">
                    <h4><strong class="text-uppercase">Your Profile</strong></h4>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <h5 class="card-title fw-bold">Nama Lengkap</h5>
                        <p class="card-text fw-semibold">{{ $data->name }}</p>
                        <h5 class="card-title fw-bold">Jenis Kelamin</h5>
                        <p class="card-text fw-semibold">{{ $gender }}</p>
                        <h5 class="card-title fw-bold">No Telepon</h5>
                        <p class="card-text fw-semibold">{{ $data->no_telepon }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5 class="card-title fw-bold">Email</h5>
                        <p class="card-text fw-semibold">{{ $data->email }}</p>
                        <h5 class="card-title fw-bold">Alamat</h5>
                        <p class="card-text fw-semibold">{{ $data->alamat }}</p>
                    </div>
                </div>
                <div class="card-footer border-top border-dark border-5">
                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i
                            class="fa-regular fa-pen-to-square"></i> <strong>EDIT PROFILE</strong></button>
                    <button type="button" class="btn btn-warning"> <i class="fa-solid fa-list"></i> <strong>RIWAYAT
                            PEMESANAN</strong></button>
                </div>
            </div>

            {{-- modal edit --}}

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-warning-subtle text-dark fw-bold">
                        <div class="modal-header border-black border-bottom border-3 ms-2 me-2">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <form action="{{ route('update.pelanggan',$data->id) }}" method="POST" enctype="multipart/form-data" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <label for="inputNama_Lengkap4" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control border-black border border-2" name="name" id="inputNama_Lengkap4" value="{{ $data->name }}" >
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputNoTelepon" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control border-black border border-2" name="no_telepon" id="inputNoTelepon" value="{{ $data->no_telepon }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control border-black border border-2 mt-4" name="email" id="inputEmail" value="{{ $data->email }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Password </label><br>
                                        <small class="fw-semibold">Masukkan password jika ingin mengganti password Anda</small>
                                        <input type="password" class="form-control border-black border border-2" name="password" id="inputPassword">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputJenis_Kelamin" class="form-label">Jenis Kelamin</label><br>
                                        <div class="btn-group mt-4" role="group" aria-label="Basic radio toggle button group"
                                            id="inputJenis_Kelamin">
                                            <input type="radio" class="btn-check" name="gender" id="btnradio1"
                                                autocomplete="off" value="L" {{ $data->gender == 'L' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-dark fw-bold" for="btnradio1">Laki-laki</label>
                                            <input type="radio" class="btn-check" name="gender" id="btnradio2"
                                                autocomplete="off" value="P" {{ $data->gender == 'P' ? 'checked' : '' }}>
                                            <label class="btn btn-outline-warning fw-bold" for="btnradio2">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputFoto" class="form-label">Foto</label><br>
                                        <small class="fw-semibold">Silahkan upload foto jika ingin mengubah foto profile
                                            Anda</small>
                                        <div class="input-group mb-3" id="inputFoto">
                                            <input type="file" class="form-control" id="inputFoto" name="foto">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="inputAddress" class="form-label">Alamat</label>
                                        <textarea class="form-control border-black border border-2" name="alamat" id="inputAddress" rows="3">{{ $data->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer border-black border-top border-3">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-dark">Edit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
