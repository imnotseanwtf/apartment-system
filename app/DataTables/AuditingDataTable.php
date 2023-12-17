<?php

namespace App\DataTables;

use App\Models\Audit;
use App\Models\Expense;
use App\Models\Payment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AuditingDataTable extends DataTable
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
            ->addColumn('user', function (Audit $audit) {
                return optional($audit->user)->name;
            })
            ->addColumn('bills', function (Audit $audit) {
                // Manually load the Expense model using the auditable_id
                $expense = Expense::find($audit->auditable_id);
                if ($expense) {
                    return $expense->bills ?? 'N/A';
                } else {
                    return 'N/A - Expense not found';
                }
            })
            ->editColumn('old_amount', function (Audit $audit) {
                return $this->simplifyJson($audit->old_values);
            })
            ->addColumn('amount', function (Audit $audit) {
                // Manually load the Payment model using the auditable_id
                $payment = Payment::where('expense_id', $audit->auditable_id)->first();
                return $payment ? $payment->amount : 'N/A';
            })
            ->editColumn('new_price', function (Audit $audit) {
                return $this->simplifyJson($audit->new_values);
            })
            ->addColumn('pay_at', function (Audit $audit) {
                return $audit->created_at->format('F j Y g:ia');
            })
            ->rawColumns(['old_amount', 'new_price']);
    }

    protected function simplifyJson($jsonString)
    {
        $json = json_decode($jsonString, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            // Convert associative array to string "key: value" format
            return collect($json)
                ->map(function ($value, $key) {
                    return "$value";
                })
                ->implode(', ');
        }
        return $jsonString; // Return original string if not a valid JSON
    }

    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function query(Audit $model)
    {
        return $model
            ->newQuery()
            ->where('lived_in_id', $this->id)
            ->with('auditable');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('auditing-table')
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
        return [Column::make('user'), Column::make('bills'), Column::make('old_amount'), Column::make('amount'), Column::make('new_price'), Column::make('pay_at')];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Auditing_' . date('YmdHis');
    }
}
