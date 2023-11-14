<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Expense;
use App\Models\LivedIn;
use Illuminate\Console\Command;

class ResetMonthlyRent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rent:add-monthly-balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add monthly rent to expenses as a balance for each lived-in record with an existing balance';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve all LivedIn records
        $livedIns = LivedIn::with('unit')->get();

        foreach ($livedIns as $livedIn) {
            // Get the most recent 'Monthly Rent' expense for this lived-in record
            $latestRentExpense = Expense::where('lived_in_id', $livedIn->id)
                ->where('bills', 'Monthly Rent')
                ->latest('created_at')
                ->first();

            if ($latestRentExpense) {
                // Add the monthly rent to the existing expense record
                $latestRentExpense->increment('price', $livedIn->unit->monthly_rent);

                // If the current price is zero, then add one month to the end date
                if ($latestRentExpense->price === $livedIn->unit->monthly_rent) {
                    $newEndDate = $latestRentExpense->end_date ? Carbon::parse($latestRentExpense->end_date)->addMonth() : Carbon::now()->addMonth();
                    $latestRentExpense->update(['end_date' => $newEndDate]);
                }
            }
        }
        $this->info('Monthly rent balances have been updated for lived-in records with an existing balance.');
    }
}
