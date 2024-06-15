@extends('layout.admin.main')

@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Tambah User Management</strong></h1>
    </div>

    <div class="card mb-4 bg-warning-subtle border-start border-black border-3">
        <div class="card-body">
            <form action="{{ route('simpan.user') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputNamaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="InputNamaLengkap" name="name"
                            placeholder="Nama Lengkap" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="InputNoTelepon" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="InputNoTelepon" name="no_telepon"
                            placeholder="Nomer Telepon" value="{{ old('no_telepon') }}">
                        @error('no_telepon')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-6 password-container">
                        <label for="InputPassword" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="InputPassword" name="password" placeholder="Password" aria-describedby="basic-addon2">
                            <span class="input-group-text" id="tog">
                                <p id="tertutup"><i class="fas fa-eye-slash" style="color: black"></i></p>
                                <p id="terbuka"><i class="fas fa-eye" style="color: black"></i></p>
                            </span>
                          </div>
                          @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold">
                    <div class="col-md-6">
                        <label for="InputGender" class="form-label">Gender</label><br>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" id="InputGender">
                            <input type="radio" class="btn-check" name="gender" id="btnradio1" value="L" autocomplete="off" checked>
                            <label class="btn btn-outline-primary fw-bold rounded-start" for="btnradio1">Laki-laki</label>
                            <input type="radio" class="btn-check" name="gender" id="btnradio2" value="P" autocomplete="off">
                            <label class="btn btn-outline-danger fw-bold" for="btnradio2">Perempuan</label>
                        </div><br>
                        @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="inputFoto" class="form-label">Foto</label><br>
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
                    <div class="col-md-6 mb-3">
                        <label for="inputAddress" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" id="inputAddress" rows="3" value="{{ old('alamat') }}"></textarea>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="InputRole" class="form-label">Role</label>
                        <select class="form-select" name="role" aria-label="Default select example">
                            <option selected>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="pelanggan">Pelanggan</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3 fw-bold d-flex">
                    <div class="col">
                        <a type="button" href="{{ route('admin.user') }}" class="tombol-form btn border-start border-black border-2 text-black w-100"><strong class="text-uppercase">Kembali</strong></a>
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
