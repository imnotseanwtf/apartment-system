<?php

namespace App\Http\Controllers;

use App\Models\tenants;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\TenantDataTable;
use App\Http\Requests\StoreTenantRequest;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TenantDataTable $tenantDataTable): JsonResponse | View
    {
        return $tenantDataTable->render('tenant.index');
    }

    public function showAllTenant(): JsonResponse | View
    {
        $tenants = Tenant::all();  // Assuming you have a Tenant model

        return response()->json($tenants);
    }

    /**
     *
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('tenant.create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $storeTenantRequest)
    {
        // Tenant::create($storeTenantRequest->validated());

        // return redirect()->route('tenant.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant): JsonResponse
    {
        return response()->json($tenant);
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTenantRequest $request, Tenant $tenant): RedirectResponse
    {
        $tenant->update($request->validated());

        return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant): RedirectResponse
    {
        $tenant->delete();

        return redirect()->route('tenant.index');
    }
}
