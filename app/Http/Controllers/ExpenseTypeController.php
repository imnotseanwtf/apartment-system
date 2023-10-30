<?php

namespace App\Http\Controllers;

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
    public function index(ExpenseTypeDataTable $dataTable)
    {
        $livedIns = LivedIn::with('unit', 'tenant')->get();

        return $dataTable->render("expenseType.index", compact("livedIns"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseTypeRequest $request)
    {
        Expense::create($request->validated());

        alert()->success('Bill has been added.');
        return redirect()->route('expenses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense): JsonResponse | View
    {

        $expense->load('livedIn.apartment');

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
        return redirect()->route('expenses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        alert()->success('Bill has been removed.');
        $expense->delete();

        return redirect()->route('expenses.index');
    }
}
