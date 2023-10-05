<?php

namespace App\Http\Controllers;

use App\Models\tenants;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\TenantDataTable;
use App\Http\Requests\StoreTenantRequest;
use App\Models\Tenant;
use Illuminate\View\View;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TenantDataTable $tenantDataTable) : JsonResponse | View
    {
        return $tenantDataTable->render('tenant.index');
    }


    /**
     *
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $storeTenantRequest)
    {
        Tenant::create($storeTenantRequest->validated());

        return redirect()->route('tenant.index');
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
    public function update(StoreTenantRequest $request, Tenant $tenants)
    {
        $tenants->update($request->validated());

        return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenants)
    {
        $tenants->delete();

        return redirect()->route('tenant.index');
    }
}
