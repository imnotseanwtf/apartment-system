@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('tenant.index') }}">Tenants</a></li>
                <li class="breadcrumb-item"><a href="{{ route('expenses.index', $id) }}">Expenses</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Expenses</div>
                <div>
                    <a class="btn btn-primary" href="{{ route('transaction.index', $id) }}">Transaction History</a>
                    <button type="button" class="btn btn-success addBillBtn" data-bs-toggle="modal"
                        data-bs-target="#plusModal">Add Expenses</button>
                </div>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
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
                            <div class="form-group">
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

                            <input type="hidden" name="lived_in_id" value="{{ $id }}">

                            <div class="form-group mt-3 mb-3">
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
                            <div class="form-group">
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

                            {{-- <div class="form-group mt-3">
                                <label for="livedin">{{ __('Live In') }}</label>
                                <select name="lived_in_id" id="" class="form-select">
                                    <option value="" selected disabled>Select Lived In</option>
                                    @foreach ($livedIns as $livedIn)
                                        <option value="{{ $livedIn->id }}">{{ $livedIn->unit->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

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

        {{-- PAY MODAL --}}

        <div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLable"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>{{ __('Payment') }}</h5>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-mark"></i>
                        </button>
                    </div>
                    <form action="{{ route('payment.store') }}" method="POST" id="store-form">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" name="expense_id" id="expense_id">
                            <input type="hidden" name="lived_in_id" value="{{ $id }}">

                            <div class="form-group">
                                <label for="">{{ __('Bills') }}</label>
                                <div class="input-group">
                                    <input placeholder="Bills" class="form-control" id="expense_bill_name" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-3 ">
                                <label for="">{{ __('Price') }}</label>
                                <div class="input-group">
                                    <input placeholder="Price" class="form-control" id="expense_price" readonly>
                                </div>
                            </div>

                            <div class="form-group mt-3">
                                <label for="">{{ __('Select Option') }}</label>
                                <select id="paymentSelect" class="form-select">
                                    <option value="downPayment">Down Payment</option>
                                    <option value="expense" id="expense_id_option">Fully Paid</option>
                                </select>
                            </div>

                            <div class="form-group mt-3">
                                <label for="">{{ __('Payment') }}</label>
                                <div class="input-group">
                                    <input type="number" name="payment" placeholder="Payment" class="form-control"
                                        value="{{ old('payment') }}" id="paymentInput">
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
                        <div class="form-group">
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

                        <div class="form-group mt-3 mb-3">
                            <label for="name">{{ __('Base Price') }}</label>
                            <div class="input-group">
                                <input name="base_price" type="text" id="view_price" @class(['form-control'])
                                    placeholder="{{ __('Base Price') }}" value="{{ old('base_price') }}" readonly>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                        </div>
                        <div class="modal-footer mt-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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

            $('#paymentSelect').trigger('change');

            $('#paymentSelect').on('change', function() {
                const unit = $(this).val();
                const paymentInput = $('#paymentInput');

                if ($(this).val() === 'downPayment') {
                    $('#paymentInput').prop('readonly', false);
                    $('#paymentInput').val(''); // Clear the input field when changing to input mode
                } else {
                    $('#paymentInput').prop('readonly', true);
                }

                if (unit) {
                    // Assuming unit corresponds to an expense ID, otherwise adjust the URL accordingly
                    $.get('/payment/' + unit, function(data) {
                        paymentInput.val(data
                            .price); // Assuming the response contains a "price" property
                    });
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

                $('.payBtn').click(function() {
                    fetch('/expenses/' + $(this).data('expense'))
                        .then(response => response.json())
                        .then(expense => {
                            $('#expense_id').val(expense.id);
                            $('#expense_id_option').val(expense.id);
                            $('#expense_bill_name').val(expense.bills);
                            $('#expense_price').val(expense.price);
                        });
                });
            })
        })
    </script>
@endpush
