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

    @if ($tenant->livedIn)
        <a href="{{ route('expenses.index', $tenant->livedIn->id) }}" class="btn btn-success">
            <i class="fa-solid fa-money-bill"></i>
        </a>
    @else
        <!-- Do something else when $tenant->livedIn is null -->
    @endif
</div>
