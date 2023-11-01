<div>
    {{-- @can('update_expense') --}}
    <button type="button" class="btn btn-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal"
        data-expense="{{ $expense->id }}">
        <i class="fa-solid fa-pen"></i>
    </button>
    {{-- @endcan --}}

    {{-- @can('read_expense') --}}
    <button class="btn btn-info viewBtn" data-bs-target="#viewModal" data-bs-toggle="modal"
        data-expense="{{ $expense->id }}">
        <i class="fa-solid fa-eye"></i>
    </button>
    {{-- @endcan --}}

    {{-- @can('delete_expense') --}}
    <button class="btn btn-danger deleteBtn" data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-expense="{{ $expense->id }}">
        <i class="fa-solid fa-trash"></i>
    </button>
    {{-- @endcan --}}

    <button class="btn btn-success payBtn" data-bs-toggle="modal" data-bs-target="#payModal"
        data-expense="{{ $expense->id }}">
        <i class="fa-solid fa-money-check"></i>
    </button>

</div>
