<?php

namespace App\DataTables;

use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembayaranDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function (Pembayaran $data) {
                return view('admin.pembayaran.validasi.action', compact('data'));
            })
            ->editColumn('tanggal_bayar', function (Pembayaran $data) {
                return Carbon::parse($data->tanggal_bayar)->format('d F Y');
            })
            ->editColumn('wallet_id', function (Pembayaran $data) {
                return $data->wallet->e_wallet;
            })
            ->editColumn('order_code', function (Pembayaran $data) {
                return $data->pemesanan->order_code;
            })
            ->editColumn('total_biaya', function (Pembayaran $data) {
                return 'Rp' . number_format($data->pemesanan->total_biaya, 2, ',', '.');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pembayaran $model): QueryBuilder
    {
        return $model->newQuery()->where('status_pembayaran', 'Menunggu Verifikasi');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('pembayaran-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
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
            Column::make('tanggal_bayar'),
            Column::make('wallet_id')->title('Wallet'),
            Column::make('order_code')->title('Kode Pesanan'),
            Column::make('total_biaya'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pembayaran_' . date('YmdHis');
    }
}
