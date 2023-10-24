<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovedInRequest;

class MovedInController extends Controller
{

    public function __invoke(StoreMovedInRequest $request, Apartment $apartment)
    {
        $apartment->livedIns()->create($request->validated());

        alert()->success('Apartment occupied successfully.');
        return redirect()->route('apartment.index');
    }
}
