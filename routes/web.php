<?php

use App\Models\Tenant;
use App\Models\Expense;
use App\Models\LivedIn;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\MovedInController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    // UNIT

    Route::resource('unit', UnitController::class)->except('index');
    Route::get('unit/{id}/units', [UnitController::class, 'index'])->name('unit.index');

    // RESOURCES

    Route::resources(
        [
            'apartment' => ApartmentController::class,
            'tenant' => TenantController::class,
            'expenses' => ExpenseTypeController::class,
        ],
        ['except' => ['create', 'edit']],
    );

    // MOVED IN

    Route::post('/apartment/{unit}/moved-in', MovedInController::class)->name('apartment.movedIn');

    // LIVED IN

    Route::get('payment/{unitPrice}', function ($expensePrice) {
        $price = Expense::find($expensePrice);

        return response()->json($price);
    });

    // EXPENSE

    Route::get('expense/{id}/expenses', [ExpenseTypeController::class, 'index'])->name('expenses.index');

    // AUDIT

    Route::post('payment/store', [PaymentController::class, 'store'])->name('payment.store');

    // Trasaction History

    Route::get('expense/{id}/history', [TransactionController::class, 'index'])->name('transaction.index');

});
