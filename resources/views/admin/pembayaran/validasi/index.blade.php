@extends('layout.admin.main')
@section('title', 'AKMALOID | Validasi Pembayaran')
@push('styles')
    <link href="{{ asset('plugins/datatables/datatable.css') }}" rel="stylesheet">
@endpush

@section('konten-admin')
    <div class="row d-flex justify-content-left" >
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Pembayaran</li>
            <li class="breadcrumb-item active" aria-current="page">Validasi Pembayaran</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Validasi Pembayaran</strong></h1>
    </div>
    @if (session()->has('suksesvalidasipembayaran'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksesvalidasipembayaran') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="ModalHapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ url('/admin/validasi-pembayaran') }}" method="POST">
                @csrf
                <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Validasi Pembayaran</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <img id="bukti_bayar_img" src="" alt="Bukti Bayar" style="width: 100%; height: auto;">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Validasi</button>
                    </div>
            </form>
          </div>
        </div>
      </div>

    @push('scripts')
        <script src="{{ asset('plugins/datatables/datatable.js') }}"></script>
        {{ $dataTable->scripts() }}
        <script>
            $('#ModalHapus').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget) // Button that triggered the modal
              var id = button.data('id') // Extract info from data-* attributes
              var bukti = button.data('bukti') // Extract info from data-* attributes

              var modal = $(this)
              modal.find('.modal-body #id').val(id)
              modal.find('.modal-body #bukti_bayar_img').attr('src', bukti)
            })
          </script>
    @endpush
@endsection
