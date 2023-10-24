<div>
    {{-- @can('update_apartment') --}}
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-apartment="{{ $apartment->id }}">
        <i class="fa-solid fa-pen"></i>
    </button>
    {{-- @endcan --}}

    {{-- @can('read_apartment') --}}
    <button class="btn btn-info viewBtn" data-bs-target="#viewModal" data-bs-toggle="modal"
        data-apartment="{{ $apartment->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>
    {{-- @endcan --}}

    {{-- @can('delete_apartment') --}}
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-apartment="{{ $apartment->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>

    <button class="btn btn-success addTenantBtn" data-bs-toggle="modal" data-bs-target="#addTenantModal"
        data-apartment="{{ $apartment->id }}">
        <i class="fa-solid fa-plus"></i>
    </button>
    {{-- @endcan --}}
</div>
