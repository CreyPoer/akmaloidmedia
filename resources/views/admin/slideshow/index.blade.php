@extends('layout.admin.main')
@section('title', 'AKMALOID | Slide Show')
@push('styles')
    <link href="{{ asset('plugins/datatables/datatable.css') }}" rel="stylesheet">
@endpush

@section('konten-admin')
    <div class="row d-flex justify-content-left" >
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Slide Show</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Slide Show</strong></h1>
            <a href="{{ route('tambah.slideshow') }}" class="btn btn-success btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Slide Show</span>
            </a>
    </div>
    @if (session()->has('suksestambahslideshow'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksestambahslideshow') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('suksesupdateslideshow'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksesupdateslideshow') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session()->has('suksesdeleteslideshow'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('suksesdeleteslideshow') }}
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
            <form action="{{ url('/admin/delete-slideshow') }}" method="POST">
                @method('delete')
                @csrf
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <p>Anda yakin ingin menghapus data slide show dengan judul <strong id="judul"></strong></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
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
              var judul = button.data('judul') // Extract info from data-* attributes

              var modal = $(this)
              modal.find('.modal-body #id').val(id)
              modal.find('.modal-body #judul').text(judul)
            })
          </script>
    @endpush
@endsection
