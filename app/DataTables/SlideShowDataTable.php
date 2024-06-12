<?php

namespace App\DataTables;

use App\Models\SlideShow;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SlideShowDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function (SlideShow $data) {
            return view('admin.slideshow.action', compact('data'));
        })
        ->editColumn('icon', function (SlideShow $data)  {
            return $data->icon != null ? '<img src="'.asset($data->icon).'" width="100px">' : '';
        })
        ->editColumn('gambar', function (SlideShow $data)  {
            return $data->gambar != null ? '<img src="'.asset($data->gambar).'" width="100px">' : '';
        })
        ->rawColumns(['icon','gambar'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SlideShow $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slideshow-table')
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
            Column::make('icon'),
            Column::make('gambar'),
            Column::make('judul'),
            Column::make('sub_judul'),
            Column::make('deskripsi'),
            Column::make('button')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'SlideShow_' . date('YmdHis');
    }
}
