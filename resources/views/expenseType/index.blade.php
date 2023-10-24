@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h4>Expenses</h4>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-success addBillBtn" data-bs-toggle="modal" data-bs-target="#plusModal">
                Add Expenses
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    {{-- ADD EXPENSES  --}}
    <div class="modal fade" id="plusModal" tabindex="-1" role="dialog" aria-labelledby="plusModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Expense Types') }}</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="bills">{{ __('Expense Types') }}</label>
                            <select name="bills" id="" class="form-select">
                                <option value="" selected disabled>Select Expense Type</option>
                                @foreach (App\Enums\ExpenseType::getValues() as $expenseType)
                                <option value="{{ $expenseType }}">{{ $expenseType }}</option>
                                @endforeach
                            </select>
                            @error('bill')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="livedin">{{ __('Live In') }}</label>
                            <select name="lived_in_id" id="" class="form-select">
                                <option value="" selected disabled>Select Lived In</option>
                                @foreach ($livedIns as $livedIn)
                                <option value="{{ $livedIn->id }}">{{ $livedIn->apartment->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="price">{{ __('Price') }}</label>
                            <div class="input-group">
                                <input type="text" name="price" placeholder="Price" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- EDIT EXPENSES --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Expense Types') }}</h5>
                    <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="bills">{{ __('Expense Types') }}</label>
                            <select name="bills" id="bill_id" class="form-select">
                                <option value="" selected disabled>Select Expense Type</option>
                                @foreach (App\Enums\ExpenseType::getValues() as $expenseType)
                                <option value="{{ $expenseType }}">{{ $expenseType }}</option>
                                @endforeach
                            </select>
                            @error('bill')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="livedin">{{ __('Live In') }}</label>
                            <select name="lived_in_id" id="livedInId" class="form-select">
                                <option value="" selected disabled>Select Lived In</option>
                                @foreach ($livedIns as $livedIn)
                                <option value="{{ $livedIn->id }}">{{ $livedIn->apartment->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label for="price">{{ __('Price') }}</label>
                            <div class="input-group">
                                <input type="text" name="price" id="priceId" placeholder="Price" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
<script type="module">

$('.editBtn').click(function() {
    fetch('expenses/' + $(this).data('expense'))
    .then(response => response.json())
    .then(expense => {

    })
})

</script>
@endpush
