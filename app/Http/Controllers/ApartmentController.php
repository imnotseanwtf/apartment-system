<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Apartment;
use Illuminate\View\View;
use App\Models\Apartments;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\ApartmentDataTable;
use App\Http\Requests\StoreApartmentRequest;
use Illuminate\Database\Eloquent\Casts\Json;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApartmentDataTable $dataTable): JsonResponse | View
    {
        return $dataTable->render('apartment.index');
    }


    public function addTenant()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        Apartment::create($request->validated());

        return redirect()->route('apartment.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment): JsonResponse
    {
        return response()->json($apartment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreApartmentRequest $request, Apartment $apartment)
    {
        $apartment->update($request->validated());

        return redirect()->route('apartment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        return redirect()->route('apartment.index');
    }
}
