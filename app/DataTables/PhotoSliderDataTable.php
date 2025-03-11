<?php

namespace App\DataTables;

use App\Models\PhotoSlider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PhotoSliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->editColumn('main_image',function($photoslider){
            return $photoslider->main_image ? '<img src="' . asset('storage/' . $photoslider->main_image) . '" alt="Banner" class="img-thumbnail" width="80">'
                : 'No Image';
        })  ->addColumn('action', function ($photoslider) {
            return view('admin.achievements.partials.actions', compact('photoslider'))->render();
        })
        ->rawColumns(['main_image','action'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PhotoSlider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('photoslider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(0);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('main_title')->title('Main Title'),
            Column::make('sub_title')->title('Sub Title'),
            Column::make('main_image')->title('Main Image'),
            Column::make('category')->title('category'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PhotoSlider_' . date('YmdHis');
    }
}
