<?php

namespace App\DataTables;

use App\Models\BoardMember;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BoardMemberDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($board) {
                return view('admin.board_members.partials.actions', compact('board'))->render();

        })->editColumn('image_path', function ($board) {
            return $board->image_path 
                ? '<img src="' . asset('storage/' . $board->image_path) . '" alt="board memeber image" class="img-thumbnail" width="80">'
                : 'No Image';
        })->
        rawColumns(['action','image_path'])
        ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BoardMember $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('boardmember-table')
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
            Column::make('id')->title('ID'),
            Column::make('name'),
            Column::make('position'),
            Column::make('type'),
            Column::make('image_path')->title('image'),
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
        return 'BoardMember_' . date('YmdHis');
    }
}
