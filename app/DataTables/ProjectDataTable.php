<?php

namespace App\DataTables;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class ProjectDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($project) {
                return view('admin.projects.partials.actions', compact('project'))->render();
            })
            ->editColumn('created_at', function ($project) {
                return Carbon::parse($project->created_at)->format('M j, Y');
            })
            ->editColumn('updated_at', function ($project) {
                return Carbon::parse($project->updated_at)->format('M j, Y');
            })
            ->addColumn('main_image', function ($project) {
                return $project->main_image 
                    ? '<img src="' . asset('storage/' . $project->main_image) . '" width="50">' 
                    : 'No Image';
            })
            ->rawColumns(['action', 'main_image'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Project $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('project-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
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
            Column::make('id')->title('ID'),
            Column::computed('main_image')
                  ->exportable(false)
                  ->printable(false)
                  ->width(100)
                  ->addClass('text-center')
                  ->title('Main Image'),
            Column::make('title')->title('Title'),
            Column::make('slug')->title('Slug'),
            Column::make('created_at')->title('Created At'),
            Column::make('updated_at')->title('Updated At'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(120)
                  ->addClass('text-center')
                  ->title('Actions'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Project_' . date('YmdHis');
    }
}