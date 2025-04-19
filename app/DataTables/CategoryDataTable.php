<?php

namespace App\DataTables;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<Category> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return '<div class="d-flex">
                            <a href="' . route('admin.categories.edit', $query->id) . '" class="btn btn-primary mx-1 "> <i class="fas fa-edit"></i> </a>
                            <a href="' . route('admin.categories.destroy', $query->id) . '" class="btn btn-danger delete-item mx-1 "> <i class="fas fa-trash"></i></a>
                        </div>';
            })

            ->addColumn('Icon', function ($query) {
                return '<img src="' . asset($query->icon_image) . '" alt="' . $query->name . '" style="width: 80px;">';
            })

            ->addColumn('Background', function ($query) {
                return '<img src="' . asset($query->background_image) . '" alt="' . $query->name . '" style="width: 80px; height: 80px;">';
            })

            ->addColumn('show_at_home', function ($query) {
                if ($query->show_at_home === 1) {
                    return '<span class="badge badge-success">Yes</span>';
                }
                return '<span class="badge badge-danger">No</span>';
            })

            ->addColumn('status', function ($query) {
                if ($query->status === 'active') {
                    return '<span class="badge badge-success">Active</span>';
                }
                return '<span class="badge badge-danger">InActive</span>';
            })

            ->rawColumns(['Icon', 'Background', 'action', 'show_at_home', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<Category>
     */
    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('category-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->width(100),
            Column::make('name'),
            Column::make('Icon'),
            Column::make('Background'),
            Column::make('show_at_home'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Category_' . date('YmdHis');
    }
}
