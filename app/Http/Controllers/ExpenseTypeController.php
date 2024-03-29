<?php

namespace App\Http\Controllers;

use App\DataTables\AuditingDataTable;
use App\Models\Expense;
use App\Models\LivedIn;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\DataTables\ExpenseTypeDataTable;
use App\Http\Requests\StoreExpenseTypeRequest;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $dataTable = new ExpenseTypeDataTable($id);

        return $dataTable->render('expenseType.index', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreExpenseTypeRequest $request)
    {
        $expense = Expense::create($request->validated());

        alert()->success('Bill has been added.');
        return redirect()->route('expenses.index', ['id' => $expense['lived_in_id']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense): JsonResponse|View
    {
        return response()->json($expense);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExpenseTypeRequest $request, Expense $expense)
    {
        $expense->update($request->validated());

        alert()->success('Bill has been updated.');
        return redirect()->route('expenses.index', ['id' => $expense['lived_in_id']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        alert()->success('Bill has been removed.');
        $expense->delete();

        return redirect()->route('expenses.index', ['id' => $expense['lived_in_id']]);
    }
}
