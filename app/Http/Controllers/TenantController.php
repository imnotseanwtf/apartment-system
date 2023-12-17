<?php

namespace App\Http\Controllers;

use App\Models\LivedIn;
use App\Models\tenants;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\DataTables\TenantDataTable;
use App\Http\Requests\Tenant\StoreTenantRequest;
use App\Http\Requests\Tenant\UpdateTenantRequest;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redis;
use Illuminate\View\View;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TenantDataTable $tenantDataTable): JsonResponse|View
    {
        $livedIns = LivedIn::with('apartment')->get();

        return $tenantDataTable->render('tenant.index', compact('livedIns'));
    }

    public function showAllTenant(): JsonResponse|View
    {
        $tenants = Tenant::all(); // Assuming you have a Tenant model

        return response()->json($tenants);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $request)
    {
        Tenant::create(
            $request->except('picture') + [
                'picture' => $request->file('picture')->store('avatars', 'public'),
            ],
        );

        alert()->success('Tenant created successfully.');
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
     * Update the specified resource in storage.
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant): RedirectResponse
    {
        if ($request->hasFile('picture')) {
            unlink(storage_path('app/public/' . $tenant->picture));
        }

        $tenant->update(
            $request->except('picture') + [
                'picture' => $request->hasFile('picture') ? $request->file('picture')->store('avatars', 'public') : $tenant->picture,
            ],
        );

        alert()->success('Tenant updated successfully.');
        return redirect()->route('tenant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant): RedirectResponse
    {
        $tenant->delete();

        alert()->success('Tenant deleted successfully.');
        return redirect()->route('tenant.index');
    }
}
