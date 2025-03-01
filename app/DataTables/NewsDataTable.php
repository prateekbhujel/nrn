<?php

namespace App\DataTables;

use App\Models\News;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NewsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('publish_date', function ($news) {
                return Carbon::parse($news->publish_date)->format('M j, Y');
            })
            ->editColumn('banner', function ($news) {
                return $news->banner 
                ? '<img src="' . asset('storage/' . $news->banner) . '" alt="Banner" class="img-thumbnail" width="80">'
                : 'No Image';
            })
            ->addColumn('action', function ($news) {
                return view('admin.news.partials.actions', compact('news'))->render();
            })
            ->rawColumns(['banner', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(News $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('news-table')
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
            Column::make('banner')->title('Banner'),
            Column::make('title'),
            Column::make('publish_date')->title('Publish Date'),
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
        return 'News_' . date('YmdHis');
    }
}
