@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="apartment">Apartment</a></li>
                <li class="breadcrumb-item"><a href="">Unit</a></li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Units</div>
                <button class="btn btn-primary" data-bs-target="#createModal" data-bs-toggle="modal">Create Unit
                </button>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>

        {{-- CREATE UNIT --}}

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create</h5>

                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="{{ route('unit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <div class="input-group">
                                    <input name="name" type="text" @class(['form-control', 'is-invalid' => $errors->has('name')])
                                        placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="monthly">{{ __('Monthly Rent') }}</label>
                                <div class="input-group">
                                    <input name="monthly_rent" type="text" @class(['form-control', 'is-invalid' => $errors->has('monthly_rent')])
                                        placeholder="{{ __('Monthly Rent') }}" value="{{ old('monthly_rent') }}" autofocus>
                                </div>
                                @error('monthly_rent')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">{{ __('Security Deposit') }}</label>
                                <div class="input-group">
                                    <input name="security_deposit" type="number" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('security_deposit'),
                                    ])
                                        placeholder="{{ __('Security Deposit') }}" value="{{ old('security_deposit') }}"
                                        autofocus>
                                </div>
                                @error('security_deposit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="advance_electricity">{{ __('Advance Electricity Bill') }}</label>
                                <div class="input-group">
                                    <input name="advance_electricity" type="number" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('advance_electricity'),
                                    ])
                                        placeholder="{{ __('Advance Electricity Bill') }}"
                                        value="{{ old('advance_electricity') }}" autofocus>
                                </div>
                                @error('advance_electricity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="advance_water">{{ __('Advance Water Bill') }}</label>
                                <div class="input-group">
                                    <input name="advance_water" type="number" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('advance_electricity'),
                                    ])
                                        placeholder="{{ __('Advance Water bill') }}" value="{{ old('advance_water') }}"
                                        autofocus>
                                </div>
                                @error('advance_water')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="name">{{ __('Description') }}</label>
                                <div class="input-group">
                                    <textarea name="description" class="form-control" type="text" @class(['form-control', 'is-invalid' => $errors->has('description')])
                                        placeholder="{{ __('Description') }}" autofocus>{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="hidden" name="apartment_id" value="{{ $id }}">

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- VIEW UNIT --}}

        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
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
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group">
                                <input name="name" type="text" id="view_name" @class(['form-control'])
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Monthly Rent') }}</label>
                            <div class="input-group">
                                <input name="address" type="text" id="view_monthly_rent" @class(['form-control'])
                                    placeholder="{{ __('Monthly Rent') }}" value="{{ old('monthly_rent') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Security Deposit') }}</label>
                            <div class="input-group">
                                <input name="security_deposit" type="text" id="view_security_deposit"
                                    @class(['form-control']) placeholder="{{ __('Security Deposit') }}"
                                    value="{{ old('security_deposit') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Advance Electricity Bill') }}</label>
                            <div class="input-group">
                                <input name="advance_electricity" type="text" id="view_advance_electricity"
                                    @class(['form-control']) placeholder="{{ __('Electricity') }}"
                                    value="{{ old('advance_electricity') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3 mb-3">
                            <label for="name">{{ __('Advance Water Bill') }}</label>
                            <div class="input-group">
                                <input name="advance_water" type="text" id="view_advance_water"
                                    @class(['form-control']) placeholder="{{ __('Water') }}"
                                    value="{{ old('advance_water') }}" readonly>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- EDIT UNIT --}}

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>

                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <div class="input-group">
                                    <input name="name" type="text" @class(['form-control', 'is-invalid' => $errors->has('name')])
                                        placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus
                                        id="edit_name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="monthly">{{ __('Monthly Rent') }}</label>
                                <div class="input-group">
                                    <input name="monthly_rent" type="text" @class(['form-control', 'is-invalid' => $errors->has('monthly_rent')])
                                        placeholder="{{ __('Monthly Rent') }}" value="{{ old('monthly_rent') }}"
                                        autofocus id="edit_monthly_rent">
                                </div>
                                @error('monthly_rent')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">{{ __('Security Deposit') }}</label>
                                <div class="input-group">
                                    <input name="security_deposit" type="number" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('security_deposit'),
                                    ])
                                        placeholder="{{ __('Security Deposit') }}" value="{{ old('security_deposit') }}"
                                        autofocus id="edit_security_deposit">
                                </div>
                                @error('security_deposit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="advance_electricity">{{ __('Advance Electricity Bill') }}</label>
                                <div class="input-group">
                                    <input name="advance_electricity" type="number" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('advance_electricity'),
                                    ])
                                        placeholder="{{ __('Advance Electricity Bill') }}"
                                        value="{{ old('advance_electricity') }}" autofocus id="edit_advance_electricity">
                                </div>
                                @error('advance_electricity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="advance_water">{{ __('Advance Water Bill') }}</label>
                                <div class="input-group">
                                    <input name="advance_water" type="number" @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('advance_electricity'),
                                    ])
                                        placeholder="{{ __('Advance Water bill') }}" value="{{ old('advance_water') }}"
                                        autofocus id="edit_advance_water">
                                </div>
                                @error('advance_water')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="name">{{ __('Description') }}</label>
                                <div class="input-group">
                                    <textarea name="description" class="form-control" type="text" @class(['form-control', 'is-invalid' => $errors->has('description')])
                                        placeholder="{{ __('Description') }}" autofocus id="edit_description">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- ADD TENANT --}}

        <div class="modal fade" id="addTenantModal" tabindex="-1" role="dialog" aria-labelledby="addTenantModal"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="apartment_name"></h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="" method="POST" enctype="multipart/form-data" id="addTenantForm">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="apartment_id" id="apartmentId">

                            <div class="form-group">
                                <label for="tenants">Tenant</label>
                                <div class="input-group">
                                    <select name="tenant_id" id="tenants" class="select2 form-control">
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('tenant_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3 mb-3">
                                <label for="date">{{ __('Moved In Date') }}</label>
                                <div class="input-group">
                                    <input name="start_date" type="date" @class(['form-control', 'is-invalid' => $errors->has('start_date')])
                                        placeholder="{{ __('Date') }}" value="{{ old('start_date') }}" autofocus
                                        id="date">
                                </div>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
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

            const tableInstance = window.LaravelDataTables['units_table'] = $('#units-table')
                .DataTable()
            tableInstance.on('draw.dt', function() {

                $('.viewBtn').click(function() {
                    fetch('/unit/' + $(this).data('unit'))
                        .then(response => response.json())
                        .then(unit => {
                            $('#view_name').val(unit.name);
                            $('#view_monthly_rent').val(unit.monthly_rent);
                            $('#view_security_deposit').val(unit.security_deposit);
                            $('#view_advance_electricity').val(unit.advance_electricity);
                            $('#view_advance_water').val(unit.advance_water);
                            $('#view_description').val(unit.description);
                        });
                })

                $('.editBtn').click(function() {
                    fetch('/unit/' + $(this).data('unit'))
                        .then(response => response.json())
                        .then(unit => {
                            $('#edit_name').val(unit.name);
                            $('#edit_monthly_rent').val(unit.monthly_rent);
                            $('#edit_security_deposit').val(unit.security_deposit);
                            $('#edit_advance_electricity').val(unit.advance_electricity);
                            $('#edit_advance_water').val(unit.advance_water);
                            $('#edit_description').val(unit.description);
                            $('#update-form').attr('action', '/unit/' + $(this).data(
                                'unit'));
                        });
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/unit/' + $(this).data('unit'));
                });

                $('.addTenantBtn').click(function() {
                    $('#apartmentId').val($(this).data('apartment'));
                    fetch('/unit/' + $(this).data('unit'))
                        .then(response => response.json())
                        .then(unit => {
                            $('#apartment_name').text(unit.name);
                            $('#addTenantForm').attr('action', '/apartment/' + $(this).data(
                                'unit') + '/moved-in');
                        });
                });

            })
        })
    </script>
@endpush
