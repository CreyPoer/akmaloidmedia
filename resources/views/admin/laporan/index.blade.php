@extends('layout.admin.main')
@section('title', 'AKMALOID | Laporan Pemasukan')
@push('styles')
<link href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.min.css" rel="stylesheet">
<link href="{{ asset('plugins/datatables/datatable.css') }}" rel="stylesheet">
@endpush

@section('konten-admin')
    <div class="row d-flex justify-content-left">
        <ol class="breadcrumb bg-transparent">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Laporan Pemasukan</li>
        </ol>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 fw-bold">Laporan Pemasukan</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="laporanpemasukan-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal Pemesanan</th>
                            <th>Pelanggan</th>
                            <th>Kode Pesanan</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="3" style="text-align:right">Total Pendapatan:</th>
                            <th id="total-pendapatan"></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    @push('scripts')
    {{ $dataTable->scripts() }}
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('plugins/datatables/datatable.js') }}"></script>
    <script src="{{ asset('vendor/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('vendor/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/pdfmake/vfs_fonts.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#laporanpemasukan-table').DataTable();

            table.on('draw', function () {
                var totalPendapatan = table.ajax.json().total_pendapatan;
                $('#total-pendapatan').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalPendapatan));
            });
        });
    </script>


    @endpush
@endsection
