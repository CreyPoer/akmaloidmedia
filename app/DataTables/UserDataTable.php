<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function (User $data) {
            return view('admin.usermanagement.action', compact('data'));
        })
        ->editColumn('foto', function (User $data)  {
            return $data->foto != null ? '<img src="'.asset($data->foto).'" width="100px">' : '';
        })
        ->editColumn('gender', function (User $data) {
            if ($data->gender == 'L') {
                return '<span class="badge bg-primary">' . 'Laki-laki' . '</span>';
            }
            return '<span class="badge bg-danger">' . 'Perempuan' . '</span>';
        })
        ->rawColumns(['foto','gender'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
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
                  ->addClass('text-center align-content-center'),
            Column::make('foto')->addClass('text-center align-content-center'),
            Column::make('name')->addClass('text-center align-content-center'),
            Column::make('gender')->addClass('text-center align-content-center'),
            Column::make('no_telepon')->addClass('text-center align-content-center'),
            Column::make('alamat'),
            Column::make('email')->addClass('text-center align-content-center'),
            Column::make('role')->addClass('text-center align-content-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
