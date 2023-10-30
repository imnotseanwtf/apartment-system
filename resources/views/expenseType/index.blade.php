@extends('layouts.app')

@section('content')
    <div class="container-fluid card">
        <div class="card-header row">
            <div class="col">
                <div class="mt-2">Expenses</div>
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
                                <label for="livedin">{{ __('Tenants') }}</label>
                                <select name="lived_in_id" id="livedInId" class="form-select">
                                    <option value="" selected disabled>Select Tenant</option>
                                    @foreach ($livedIns as $livedIn)
                                        <option value="{{ $livedIn->id }}">
                                            {{ $livedIn->tenant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">{{ __('Unit Name') }}</label>
                                <div class="input-group">
                                    <input name="unitName" type="text" id="unitName" @class(['form-control'])
                                        placeholder="{{ __('Unit Name') }}" value="{{ old('unitName') }}" readonly>
                                </div>
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
                                <select name="lived_in_id" id="" class="form-select">
                                    {{-- <option value="" selected disabled>Select Lived In</option> --}}
                                    @foreach ($livedIns as $livedIn)
                                        <option value="{{ $livedIn->id }}">{{ $livedIn->unit->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="price">{{ __('Price') }}</label>
                                <div class="input-group">
                                    <input type="text" name="price" placeholder="Price" class="form-control"
                                        value="{{ old('price') }}" id="edit_price">
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

        {{-- VIEW EXPENSES --}}

        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">View</h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group mt-3">
                            <label for="name">{{ __('Bills Name') }}</label>
                            <div class="input-group">
                                <input name="bills" type="text" id="view_bills" @class(['form-control'])
                                    placeholder="{{ __('Bills') }}" value="{{ old('bills') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Lived In') }}</label>
                            <div class="input-group">
                                <input name="address" type="text" id="view_name" @class(['form-control'])
                                    placeholder="{{ __('Address') }}" value="{{ old('') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Base Price') }}</label>
                            <div class="input-group">
                                <input name="base_price" type="text" id="view_price" @class(['form-control'])
                                    placeholder="{{ __('Base Price') }}" value="{{ old('base_price') }}" readonly>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- DELETE MODAL --}}

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deletePromoModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="" method="POST" id="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-2">Are you sure you want to delete this?</div>
                            <div class="modal-footer mt-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script type="module">
        $(() => {

            $('#livedInId').trigger('change');

            $('#livedInId').on('change', function() {
                console.log('click');
                const unit = $(this).val();

                if (unit) {
                    $.get('/lived-in/' + unit, function(data) {
                        console.log(data);
                        $('#unitName').val(data.unit.name); // Assuming the response contains a "unitName" property
                    })
                }
            });

            const tableInstance = window.LaravelDataTables['expensetype-table'] = $('#expensetype-table')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/expenses/' + $(this).data('expense'))
                        .then(response => response.json())
                        .then(expense => {
                            $('#view_bills').val(expense.bills);
                            $('#view_price').val(expense.price);
                            $('#view_name').val(expense.livedIn.apartment.name);
                        });
                });

                $('.editBtn').click(function() {
                    fetch('/expenses/' + $(this).data('expense'))
                        .then(response => response.json())
                        .then(expense => {
                            $('#edit_bills').val(expense.bills)
                            $('#edit_price').val(expense.price)
                            $('#update-form').attr('action', '/expenses/' + $(this).data(
                                'expense'));
                        })
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/expenses/' + $(this).data('expense'));
                });

            })


        })
    </script>
@endpush
