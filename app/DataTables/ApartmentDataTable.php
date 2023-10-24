<?php

namespace App\DataTables;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ApartmentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('actions', fn (Apartment $apartment) => view('apartment.components.action', compact('apartment')))
            ->addColumn('picture', fn (Apartment $apartment) => '<img src="storage/' . $apartment->picture . '" height="50" width="50"/>')
            ->rawColumns(['actions', 'picture']);
    }

    /**
     * Get the query source of dataTable.
     */

    public function query(Apartment $model): QueryBuilder
    {
        return $model->newQuery();;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('apartment_dataTable')
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
            Column::make('picture'),
            Column::make('name'),
            Column::make('address'),
            Column::make('base_price'),
            Column::make('actions')
                ->searchable(false)
                ->printable(false)
                ->orderable(false)
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Apartment_' . date('YmdHis');
    }
}
