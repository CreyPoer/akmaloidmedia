<?php

namespace App\DataTables;

use App\Models\Paket;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaketDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function (Paket $data) {
            return view('admin.datamaster.paket.action', compact('data'));
        })
        ->addColumn('kategori_produk', function (Paket $paket) {
            return $paket->kategori_produk->name;
        })
        ->addColumn('penerbit', function (Paket $paket) {
            return $paket->penerbit->name;
        })
        ->addColumn('periode', function (Paket $paket) {
            return $paket->periode->periode;
        })
        ->editColumn('gambar', function (Paket $data)  {
            return $data->gambar != null ? '<img src="'.asset($data->gambar).'" width="100px">' : '';
        })
        ->rawColumns(['gambar'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Paket $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('paket-table')
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
            Column::make('gambar'),
            Column::make('kategori_produk')->title('Kategori Produk'),
            Column::make('penerbit')->title('Penerbit'),
            Column::make('periode')->title('Periode'),
            Column::make('name'),
            Column::make('waktu_pengiriman'),
            Column::make('harga_paket'),
            Column::make('deskripsi')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Paket_' . date('YmdHis');
    }
}
