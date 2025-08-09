<?php

    namespace App\DataTables;

    use App\Models\WhyChooseUs;
    use Illuminate\Database\Eloquent\Builder as QueryBuilder;
    use Yajra\DataTables\EloquentDataTable;
    use Yajra\DataTables\Html\Builder as HtmlBuilder;
    use Yajra\DataTables\Html\Button;
    use Yajra\DataTables\Html\Column;
    use Yajra\DataTables\Html\Editor\Editor;
    use Yajra\DataTables\Html\Editor\Fields;
    use Yajra\DataTables\Services\DataTable;

    class WhyChooseUsDataTable extends DataTable
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
                            'admin.why-choose-us.edit',
                            $query->id
                        ) . '" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>';
                    $delete = '<a href="' . route(
                            'admin.why-choose-us.destroy',
                            $query->id
                        ) . '" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash"></i></a>';
                    return $edit . ' ' . $delete;
                })
                ->addColumn('status', function ($query) {
                    $badge = $query->status ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                    return $badge;
                })
                ->editColumn('icon', function ($query) {
                    $icon = "<i class='" . $query->icon . "'></i>";
                    return $icon;
                })
                ->rawColumns(['status', 'action', 'icon'])
                ->setRowId('id');
        }

        /**
         * Get the query source of dataTable.
         */
        public function query(WhyChooseUs $model): QueryBuilder
        {
            return $model->newQuery();
        }

        /**
         * Optional method if you want to use the html builder.
         */
        public function html(): HtmlBuilder
        {
            return $this->builder()
                ->setTableId('whychooseus-table')
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
                Column::make('title'),
                Column::make('icon'),
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
            return 'WhyChooseUs_' . date('YmdHis');
        }
    }
