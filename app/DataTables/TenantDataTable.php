<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use App\Models\Tenant;
use App\Models\Expense;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class TenantDataTable extends DataTable
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
            ->addColumn('picture', fn (Tenant $tenant) => '<img src="storage/' . $tenant->picture . '" height="50" width="50"/>')
            ->addColumn('actions', fn (Tenant $tenant) => view('tenant.components.action', compact('tenant')))
            ->editColumn('lived_in.apartment.name', fn (Tenant $tenant) => $tenant->livedIn?->apartment?->name ?? 'No Occupied Apartment')
            ->editColumn('lived_in.unit.name', fn (Tenant $tenant) => $tenant->livedIn?->unit?->name ?? 'No Occupied Unit')
            ->addColumn('balance', function (Tenant $tenant) {
                $totalExpense = Expense::whereHas('livedIn', function ($query) use ($tenant) {
                    $query->where('tenant_id', $tenant->id);
                })->sum('price');

                // Check if the tenant doesn't have a unit yet
                if (!$tenant->livedIn) {
                    return 'No Unit Yet';
                }

                // Check if the sum of prices is zero
                if ($totalExpense === 0) {
                    return '<i class="fas fa-check-circle fa-2x text-success"></i>';
                }

                return $totalExpense;
            })
            ->rawColumns(['actions', 'picture', 'balance']);
    }

    /**
     * Get the query source of dataTable.
     */

    public function query(Tenant $model): QueryBuilder
    {
        return $model
            ->newQuery()
            ->with('livedIn.apartment')
            ->with('livedIn.unit')
            ->select('tenants.*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('tenant_dataTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([Button::make('excel'), Button::make('csv'), Button::make('pdf'), Button::make('print'), Button::make('reset'), Button::make('reload')]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('picture'),
            Column::make('name')->addClass('text-center'),
            Column::make('number')->addClass('text-center'),
            Column::make('lived_in.apartment.name', 'livedIn.apartment.name')->addClass('text-center'),
            Column::make('lived_in.unit.name', 'livedIn.unit.name')->addClass('text-center'),
            Column::make('balance')->addClass('text-center'),
            Column::make('actions')
                ->searchable(false)
                ->printable(false)
                ->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Tenant_' . date('YmdHis');
    }
}
