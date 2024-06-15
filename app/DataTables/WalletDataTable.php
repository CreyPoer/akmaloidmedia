<?php

namespace App\DataTables;

use App\Models\Wallet;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WalletDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function (Wallet $data) {
            return view('admin.pembayaran.wallet.action', compact('data'));
        })
        ->editColumn('gambar', function (Wallet $data)  {
            return $data->gambar != null ? '<img src="'.asset($data->gambar).'" width="100px">' : '';
        })
        ->rawColumns(['gambar'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Wallet $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('wallet-table')
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
            Column::make('gambar')->addClass('text-center'),
            Column::make('e_wallet')->addClass('text-center'),
            Column::make('nama_rek')->title('Nama Rekening')->addClass('text-center'),
            Column::make('no_rek')->title('Nomer Rekening')->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Wallet_' . date('YmdHis');
    }
}
