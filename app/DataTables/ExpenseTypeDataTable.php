<?php

namespace App\DataTables;

use App\Models\Expense;
use App\Models\ExpenseType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

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
            ->addColumn('payment_status', function ($expense) {
                return $expense->payment_status;
            })
            ->addColumn('action', fn(Expense $expense) => view('expenseType.components.action', compact('expense')))
            ->rawColumns(['action', 'payment_status']);
    }

    /**
     * Get the query source of dataTable.
     */

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query(Expense $model)
    {
        $query = $model
            ->newQuery()
            ->with('livedIn')
            ->where('lived_in_id', $this->id)
            ->select(['expenses.*', DB::raw('IF(price = 0, "<i class=\"fas fa-check-circle fa-2x text-success\"></i>", "<i class=\"fas fa-times-circle fa-2x text-danger\"></i>") as payment_status')]);

        return $this->applyScopes($query);
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
            ->buttons([Button::make('excel'), Button::make('csv'), Button::make('pdf'), Button::make('print'), Button::make('reset'), Button::make('reload')]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('bills'),
            Column::make('price'),
            Column::make('payment_status')
                ->title('Payment Status')
                ->exportable(false)
                ->width(30)
                ->addClass('text-center'),
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
