<?php

    namespace App\DataTables;

    use App\Models\Slider;
    use Illuminate\Database\Eloquent\Builder as QueryBuilder;
    use Illuminate\Support\Facades\Storage;
    use Yajra\DataTables\EloquentDataTable;
    use Yajra\DataTables\Html\Builder as HtmlBuilder;
    use Yajra\DataTables\Html\Column;
    use Yajra\DataTables\Services\DataTable;

    class SlidersDataTable extends DataTable
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
                ->addColumn('action', function ($query) {
                    $edit = '<a href="' . route(
                            'admin.sliders.edit',
                            $query->id
                        ) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                    $delete = '<a href="' . route(
                            'admin.sliders.destroy',
                            $query->id
                        ) . '" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>';
                    return $edit . ' ' . $delete;
                })
                ->editColumn('image', function ($query) {
                    $url = Storage::url($query->image);
                    return '<div class="text-center"><img src="' . $url . '" alt="Slider Image" class="rounded" style="max-width: 50px; height: auto;"></div>';
                })
                ->addColumn('status', function ($query) {
                    $badge = $query->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                    return $badge;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->setRowId('id');
        }

        /**
         * Get the query source of dataTable.
         */
        public function query(Slider $model): QueryBuilder
        {
            return $model->newQuery();
        }

        /**
         * Optional method if you want to use the html builder.
         */
        public function html(): HtmlBuilder
        {
            return $this->builder()
                ->setTableId('sliders-table')
                ->columns($this->getColumns())
                ->minifiedAjax()
                ->dom('Bfrtip')
                ->orderBy(1);
        }

        /**
         * Get the dataTable columns definition.
         */
        public function getColumns(): array
        {
            return [
                Column::make('DT_RowIndex')
                    ->title('#')
                    ->addClass('text-center')
                    ->width(3)
                    ->searchable(false)
                    ->orderable(false),
                Column::make('image')
                    ->width(100),
                Column::make('title'),
                Column::make('offer'),
                Column::make('sub_title'),
                Column::make('short_description'),
                Column::make('status'),
                Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(100)
                    ->addClass('text-center'),
            ];
        }

        /**
         * Get the filename for export.
         */
        protected function filename(): string
        {
            return 'Sliders_' . date('YmdHis');
        }
    }
