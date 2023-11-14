<?php

namespace App\DataTables;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UnitDataTable extends DataTable
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
            ->addColumn('actions', fn (Unit $unit) => view('unit.components.action', compact('unit')))
            ->addColumn('status', fn(Unit $unit) => $unit->livedIn?->tenant?->name ?? 'No Tenant Yet');
    }

    /**
     * Get the query source of dataTable.
     */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query(Unit $model)
    {
        return $model->newQuery()
            ->with('apartment')
            ->where('apartment_id', $this->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('units-table')
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
            Column::make('name'),
            Column::make('monthly_rent'),
            Column::make('security_deposit'),
            Column::make('advance_electricity'),
            Column::make('advance_water'),
            Column::make('status'),
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
        return 'Units_' . date('YmdHis');
    }
}
