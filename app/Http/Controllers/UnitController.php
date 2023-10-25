<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\DataTables\UnitDataTable;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Unit\StoreUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UnitDataTable $dataTable): JsonResponse | View
    {

        return $dataTable->render('unit.index');
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
    public function store(StoreUnitRequest $storeUnitRequest)
    {
        Unit::create($storeUnitRequest->validated());

        alert()->success('Unit has been added');
        return redirect()->route('unit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit): JsonResponse | View
    {

        return response()->json($unit);
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
    public function update(UpdateUnitRequest $updateUnitRequest, Unit $unit)
    {
        $unit->update($updateUnitRequest->validated());

        alert()->success('Unit has been Updated');
        return redirect()->router('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        alert()->success('Unit has been Deleted');

        $unit->delete();

        return redirect()->route('unit.index');
    }
}
