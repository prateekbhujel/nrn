<?php

namespace App\DataTables;

use App\Models\TimelineItem;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TimelineItemDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('image_path',function($timeline){
                return $timeline->image_path ? '<img src="' . asset('storage/' . $timeline->image_path) . '" alt="timeline image" class="img-thumbnail" width="80">'
                    : 'No Image';
            })
            ->addColumn('action',function($timeline){
                return view('admin.timeline_items.partials.actions',compact('timeline'))->render();
            })
            ->rawColumns(['action','image_path'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TimelineItem $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('timelineitem-table')
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
            Column::make('DT_RowIndex')->title('S.N')->searchable(false)->orderable(false),
            Column::make('image_path')->title('image_path')->exportable(false)->printable(false),
            Column::make('title')->title('Title'),
            Column::make('year')->title('year'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'TimelineItem_' . date('YmdHis');
    }
}
