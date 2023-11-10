<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePaymentRequest $request)
    {
        $validatedData = $request->validated();

        $expense = Expense::find($validatedData['expense_id']);
        $paymentAmount = $validatedData['payment'];

        // Get lived_in_id from the form data
        $livedInId = $validatedData['lived_in_id'];

        if ($paymentAmount <= $expense->price) {
            $payment = new Payment();
            $payment->expense_id = $expense->id;
            $payment->amount = $paymentAmount;

            // Set lived_in_id in the Audit model
            $payment->lived_in_id = $livedInId;

            $payment->save();

            $expense->price -= $paymentAmount;
            $expense->save();
        }

        alert()->success('Payment Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
