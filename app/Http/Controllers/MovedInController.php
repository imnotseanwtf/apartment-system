<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMovedInRequest;
use Carbon\Carbon;

class MovedInController extends Controller
{
    public function __invoke(StoreMovedInRequest $request, Unit $unit)
    {
        // Create LivedIn record
        $livedIn = $unit->livedIn()->create($request->validated());

        // Get the start date from the request and add one month to it
        $endDate = Carbon::parse($request->input('start_date'))->addMonth();

        // Create a single expense entry for monthly rent
        $livedIn->expenses()->create([
            'bills' => 'Monthly Rent',
            'price' => $unit->monthly_rent,
            'lived_in_id' => $livedIn->id,
            'start_date' => $request->input('start_date'),
            'end_date' => $endDate,
        ]);

        // Create additional one-time expenses
        $oneTimeExpensesData = [['bills' => 'Security Deposit', 'price' => $unit->security_deposit], ['bills' => 'Advance Electricity', 'price' => $unit->advance_electricity], ['bills' => 'Advance Water', 'price' => $unit->advance_water]];

        foreach ($oneTimeExpensesData as $expenseData) {
            $livedIn->expenses()->create($expenseData);
        }

        alert()->success('Tenant added and monthly rent activated successfully.');
        return redirect()->route('tenant.index');
    }
}
