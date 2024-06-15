@extends('layout.admin.main')
@section('title', 'AKMALOID | Pemesanan')
@push('styles')
    <link href="{{ asset('plugins/datatables/datatable.css') }}" rel="stylesheet">

@endpush

@section('konten-admin')
    <div class="row d-flex justify-content-left" >
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold"><strong>Pemesanan</strong></h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>


    @push('scripts')

    {{ $dataTable->scripts() }}
    <script src="{{ asset('plugins/datatables/datatable.js') }}"></script>

    @endpush
@endsection
