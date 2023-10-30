<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovedInRequest;

class MovedInController extends Controller
{

    public function __invoke(StoreMovedInRequest $request, Unit $unit)
    {
        $unit->livedIns()->create($request->validated());

        alert()->success('Apartment occupied successfully.');
        return redirect()->route('tenant.index');
    }
}
