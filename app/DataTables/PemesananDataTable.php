<?php

namespace App\DataTables;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PemesananDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function (Pemesanan $data) {
            return view('admin.pemesanan.action', compact('data'));
        })
        ->editColumn('status_pemesanan', function (Pemesanan $data) {
            if ($data->status_pemesanan == 'Menunggu Konfirmasi') {
                return '<span class="badge bg-warning">' . 'Menunggu Konfirmasi' . '</span>';
            }elseif ($data->status_pemesanan == 'Aktif'){
                return '<span class="badge bg-success">' . 'Aktif' . '</span>';
            }
            return '<span class="badge bg-danger">' . 'Belum Aktif' . '</span>';
        })
        ->editColumn('user_id', function (Pemesanan $data) {
            return $data->user->name;
        })
        ->editColumn('tanggal_pemesanan', function (Pemesanan $data) {
            return Carbon::parse($data->tanggal_pemesanan)->format('d F Y');
        })
        ->editColumn('total_biaya', function (Pemesanan $data) {
            return 'Rp' . number_format($data->total_biaya, 2, ',', '.');
        })
        ->rawColumns(['status_pemesanan']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pemesanan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pemesanan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->serverSide(true)
                    ->processing(true)
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('user_id')->title('Pelanggan'),
            Column::make('order_code')->title('Kode Pesanan'),
            Column::make('tanggal_pemesanan'),
            Column::make('total_biaya'),
            Column::make('status_pemesanan'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pemesanan_' . date('YmdHis');
    }
}
