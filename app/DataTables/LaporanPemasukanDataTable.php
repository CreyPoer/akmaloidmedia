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

class LaporanPemasukanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('user_id', function (Pemesanan $data) {
                return $data->user->name;
            })
            ->editColumn('tanggal_pemesanan', function (Pemesanan $data) {
                return Carbon::parse($data->tanggal_pemesanan)->format('d F Y');
            })
            ->editColumn('total_biaya', function (Pemesanan $data) {
                return 'Rp' . number_format($data->total_biaya, 2, ',', '.');
            })
            ->with('total_pendapatan', $query->sum('total_biaya'));
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pemesanan $model): QueryBuilder
    {
        $query = $model->newQuery();
        $query->where('status_pemesanan', 'Aktif');
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('laporanpemasukan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv')->footer(true),
                        Button::make('pdf'),
                        Button::make('print')->footer(true)
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('tanggal_pemesanan'),
            Column::make('user_id')->title('Pelanggan'),
            Column::make('order_code')->title('Kode Pesanan'),
            Column::make('total_biaya'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LaporanPemasukan_' . date('YmdHis');
    }
}
