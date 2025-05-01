<?php

namespace App\DataTables;

use App\Models\Event;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EventDataTable extends DataTable
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
            ->editColumn('event_date', function ($news) {
                return Carbon::parse($news->event_date)->format('M j, Y');
            })
            ->addColumn('action', function ($event) {
                return view('admin.events.partials.actions', compact('event'))->render();
            })
            ->editColumn('banner', function ($event) {
                return $event->banner
                    ? '<img src="' . asset('storage/' . $event->banner) . '" alt="Banner" class="img-thumbnail" width="80">'
                    : 'No Image';
            })
            ->rawColumns(['action', 'banner'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Event $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the HTML builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('event-table')
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
            // Column::make('id')->title('ID'),
            Column::make('DT_RowIndex')->title('S.N')->searchable(false)->orderable(false), 
            Column::make('banner')->title('Banner')->exportable(false)->printable(false),
            Column::make('title')->title('Title'),
            Column::make('event_date')->title('Event Date'),
            Column::make('location')->title('Location'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
            // Column::make('created_at')->title('Created At'),
            // Column::make('updated_at')->title('Updated At'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Event_' . date('YmdHis');
    }
}
