<?php

namespace App\DataTables;

use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExpenseTypeDataTable extends DataTable
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
        ->addColumn('action', fn(Expense $expense) => view('expenseType.components.actions', compact('expense')));
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Expense $model): QueryBuilder
    {
        return $model->newQuery()
            ->with('livedIn.apartment')
            ->select('expenses.*');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('expensetype-table')
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
            // Column::make('id'),
            Column::make('bills'),
            Column::make('lived_in.apartment.name', 'livedIn.apartment.name'),
            Column::make('price'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ExpenseType_' . date('YmdHis');
    }
}
