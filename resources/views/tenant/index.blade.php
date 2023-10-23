@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Tenants</div>
                <a href="tenant/create" class="btn btn-primary">New Tenant</a>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Tenant</h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="{{ route('tenant.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <!-- Name -->
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

                                    <!-- Picture -->
                                    <div class="form-group mt-3">
                                        <label for="name">{{ __('Picture') }}</label>
                                        <div class="input-group">
                                            <input name="picture" type="file" @class(['form-control', 'is-invalid' => $errors->has('picture')])
                                                placeholder="{{ __('picture') }}" value="{{ old('picture') }}" autofocus>
                                        </div>
                                        @error('picture')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <!-- Occupation -->
                                    <div class="form-group">
                                        <label for="name">{{ __('Occupation') }}</label>
                                        <div class="input-group">
                                            <input name="occupation" type="text" @class(['form-control', 'is-invalid' => $errors->has('occupation')])
                                                placeholder="{{ __('occupation') }}" value="{{ old('occupation') }}"
                                                autofocus>
                                        </div>
                                        @error('occupation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Number -->
                                    <div class="form-group mt-3">
                                        <label for="name">{{ __('No.') }}</label>
                                        <div class="input-group">
                                            <input name="number" type="number" @class(['form-control', 'is-invalid' => $errors->has('number')])
                                                placeholder="{{ __('No.') }}" value="{{ old('number') }}" autofocus>
                                        </div>
                                        @error('number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="form-group mt-3 mb-3">
                                        <label for="name">{{ __('Email') }}</label>
                                        <div class="input-group">
                                            <input name="email" type="text" @class(['form-control', 'is-invalid' => $errors->has('email')])
                                                placeholder="{{ __('Email') }}" value="{{ old('email') }}" autofocus>
                                        </div>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group">
                                <input name="name" type="text" id="view_name" @class(['form-control'])
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('occupation') }}</label>
                            <div class="input-group">
                                <input name="occupation" type="text" id="view_occupation" @class(['form-control'])
                                    placeholder="{{ __('occupation') }}" value="{{ old('occupation') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Number') }}</label>
                            <div class="input-group">
                                <input name="number" type="text" id="view_number" @class(['form-control'])
                                    placeholder="{{ __('No.') }}" value="{{ old('number') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('email') }}</label>
                            <div class="input-group">
                                <input name="email" type="text" id="view_email" @class(['form-control'])
                                    placeholder="{{ __('email') }}" value="{{ old('email') }}" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form action="" method="POST" id="update-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group mt-3">
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
                                <label for="name">{{ __('Picture') }}</label>
                                <div class="input-group">
                                    <input name="picture" type="file" @class(['form-control', 'is-invalid' => $errors->has('picture')])
                                        placeholder="{{ __('Picture') }}" value="{{ old('picture') }}" autofocus>
                                </div>
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <label for="name">{{ __('Occupation') }}</label>
                                <div class="input-group">
                                    <input name="occupation" type="text" @class(['form-control', 'is-invalid' => $errors->has('occupation')])
                                        placeholder="{{ __('occupation') }}" value="{{ old('occupation') }}" autofocus
                                        id="edit_occupation">
                                </div>
                                @error('occupation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">{{ __('Number') }}</label>
                                <div class="input-group">
                                    <input name="number" type="number" @class(['form-control', 'is-invalid' => $errors->has('number')])
                                        placeholder="{{ __('No.') }}" value="{{ old('number') }}" autofocus
                                        id="edit_number">
                                </div>
                                @error('number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">{{ __('email') }}</label>
                                <div class="input-group">
                                    <textarea name="email" class="form-control" type="text" @class(['form-control', 'is-invalid' => $errors->has('email')])
                                        placeholder="{{ __('email') }}" autofocus id="edit_email">{{ old('email') }}</textarea>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
        $(() => {

            const tableInstance = window.LaravelDataTables['tenant_dataTable'] = $('#tenant_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {
                $('.viewBtn').click(function() {
                    console.log('btn click');
                    fetch('/tenant/' + $(this).data('tenant'))
                        .then(response => response.json())
                        .then(tenant => {
                            console.log(tenant)
                            $('#view_name').val(tenant.name)
                            $('#view_number').val(tenant.number)
                            $('#view_email').val(tenant.email)
                            $('#view_occupation').val(tenant.occupation)
                        })
                })
                $('.editBtn').click(function() {
                    fetch('/tenant/' + $(this).data('tenant'))
                        .then(response => response.json())
                        .then(tenant => {
                            $('#edit_name').val(tenant.name)
                            $('#edit_number').val(tenant.number)
                            $('#edit_email').val(tenant.email)
                            $('#edit_occupation').val(tenant.occupation)
                            $('#update-form').attr('action', '/tenant/' + $(this).data(
                                'tenant'));
                        })
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/tenant/' + $(this).data('tenant'));
                });
            })
        })
    </script>
@endpush
