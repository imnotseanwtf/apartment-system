<div>
    {{-- @can('update_tenant') --}}
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-tenant="{{ $tenant->id }}">
        <i class="fa-solid fa-pen"></i>
    </button>
    {{-- @endcan --}}

    {{-- @can('read_tenant') --}}
        <button class="btn btn-info viewBtn" data-bs-target="#viewModal" data-bs-toggle="modal"
            data-tenant="{{ $tenant->id }}">
            <i class="fa-solid fa-eye"></i>
        </button>
    {{-- @endcan --}}

    {{-- @can('delete_tenant') --}}
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-tenant="{{ $tenant->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>
    {{-- @endcan --}}
</div>
