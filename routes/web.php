<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\TenantController;
use App\Models\Tenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


    Route::resource('apartment', ApartmentController::class);
    // Route::store('apartment/{tenant}/addtenant' , [ApartmentController::class , 'addTenant'])->name('apartment.addTenant');

    Route::resource('tenant', TenantController::class);

    Route::get('api/tenant/', [TenantController::class, 'showAllTenant']);
});
