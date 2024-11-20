<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Tenant;
use App\Models\LivedIn;
use App\Models\Payment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        $livedInCount = LivedIn::count();

        $unitCount = Unit::count();

        $tenantCount = Tenant::count();

        $unitSales = Unit::doesntHave('livedIn')->count();

        $livedIn = LivedIn::selectRaw('DATE(start_date) as date, COUNT(*) as lived_in_count')->groupBy('date')->get();

        $profit = Payment::selectRaw('DATE(created_at) as date, SUM(amount) as profit_count')->groupBy('date')->get();

        return view('dashboard', compact('livedIn', 'profit', 'livedInCount', 'unitCount', 'tenantCount', 'unitSales'));
    }
}
