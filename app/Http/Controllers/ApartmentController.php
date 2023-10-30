<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Apartment;
use Illuminate\View\View;
use App\Models\Apartments;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\ApartmentDataTable;
use App\Http\Requests\Apartment\StoreApartmentRequest;
use App\Http\Requests\Apartment\UpdateApartmentRequest;
use Illuminate\Database\Eloquent\Casts\Json;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ApartmentDataTable $dataTable): JsonResponse|View
    {
        return $dataTable->render('apartment.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {
        Apartment::create(
            $request->except('picture') + [
                'picture' => $request->file('picture')->store('apartments', 'public'),
            ],
        );

        alert()->success('Apartment created successfully.');
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
     * Update the specified resource in storage.
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        if ($request->hasFile('picture')) {
            unlink(storage_path('app/public/' . $apartment->picture));
        }

        $apartment->update(
            $request->except('picture') + [
                'picture' => $request->hasFile('picture') ? $request->file('picture')->store('avatars', 'public') : $apartment->picture,
            ],
        );

        alert()->success('Apartment updated successfully.');
        return redirect()->route('apartment.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->delete();

        alert()->success('Apartment deleted successfully.');
        return redirect()->route('apartment.index');
    }
}
