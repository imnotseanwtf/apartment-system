@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>Manage Categories</div>
                <button class="btn btn-primary" data-bs-target="#createModal" data-bs-toggle="modal">Create apartment
                </button>
            </div>
            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>


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
                    <form action="{{ route('apartment.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="name">{{ __('Icon') }}</label>
                                <div class="input-group">
                                    <input name="icon" type="file" @class(['form-control', 'is-invalid' => $errors->has('icon')])
                                        placeholder="{{ __('Icon') }}" value="{{ old('icon') }}" autofocus>
                                </div>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group mt-3">
                                <label>{{ __('Priority Level') }}</label>
                                <select class="form-select" name="base_priority_level">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}
                            <div class="form-group mt-3">
                                <label for="name">{{ __('Address') }}</label>
                                <div class="input-group">
                                    <input name="address" type="text" @class(['form-control', 'is-invalid' => $errors->has('address')])
                                        placeholder="{{ __('Address') }}" value="{{ old('address') }}" autofocus>
                                </div>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">{{ __('Base Price') }}</label>
                                <div class="input-group">
                                    <input name="base_price" type="number" @class(['form-control', 'is-invalid' => $errors->has('base_price')])
                                        placeholder="{{ __('base_price') }}" value="{{ old('base_price') }}" autofocus>
                                </div>
                                @error('base_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">{{ __('Description') }}</label>
                                <div class="input-group">
                                    <textarea name="description" class="form-control" type="text" @class(['form-control', 'is-invalid' => $errors->has('description')])
                                        placeholder="{{ __('Description') }}" autofocus>{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>



                            {{-- <div class="mt-3 form-group">
                                <label class="col-12">{{ __('Parent apartment') }}</label>
                                <select class="form-control col-12" name="parent_id">
                                    <option value="" selected>Select apartment</option>
                                    @foreach ($categories as $apartment)
                                        <option value="{{ $apartment->id }}"> {{ $apartment->name }} </option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}


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


                        {{-- <div class="row mt-3">
                            <label for="view_icon" class="col-12">{{ __('Icon') }}</label>
                            <img id="view_icon" alt="apartment_icon" src="">
                        </div> --}}

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Address') }}</label>
                            <div class="input-group">
                                <input name="address" type="text" id="view_address" @class(['form-control'])
                                    placeholder="{{ __('Address') }}" value="{{ old('address') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Base Price') }}</label>
                            <div class="input-group">
                                <input name="base_price" type="text" id="view_price" @class(['form-control'])
                                    placeholder="{{ __('Base Price') }}" value="{{ old('base_price') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name">{{ __('Description') }}</label>
                            <div class="input-group">
                                <input name="description" type="text" id="view_description"
                                    @class(['form-control']) placeholder="{{ __('Description') }}"
                                    value="{{ old('description') }}" readonly>
                            </div>
                        </div>

                        {{-- <div class="form-group mt-3">
                            <label for="name">{{ __('Priority Level') }}</label>
                            <div class="input-group">
                                <input name="name" type="text" id="view_priority_level"
                                    @class(['form-control']) placeholder="{{ __('Name') }}"
                                    value="{{ old('priority_level') }}" readonly>
                            </div>
                        </div> --}}
                        {{--
                        <div class="mt-3 form-group">
                            <label class="col-12" for="parent_id">{{ __('Parent apartment') }}</label>
                            <div class="input-group">
                                <input name="name" type="text" id="view_parent_apartment"
                                    @class(['form-control']) placeholder="{{ __('Parent apartment') }}"
                                    value="{{ old('parent_apartment') }}" readonly>
                            </div>
                        </div> --}}


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
                                        placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus id="edit_name">
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="form-group mt-3">
                                <label for="name">{{ __('Icon') }}</label>
                                <div class="input-group">
                                    <input name="icon" type="file" @class(['form-control', 'is-invalid' => $errors->has('icon')])
                                        placeholder="{{ __('Icon') }}" value="{{ old('icon') }}" autofocus>
                                </div>
                                @error('icon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div> --}}

                            <div class="form-group mt-3">
                                <label for="name">{{ __('Address') }}</label>
                                <div class="input-group">
                                    <input name="address" type="text" @class(['form-control', 'is-invalid' => $errors->has('address')])
                                        placeholder="{{ __('Address') }}" value="{{ old('address') }}" autofocus id="edit_address">
                                </div>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">{{ __('Base Price') }}</label>
                                <div class="input-group">
                                    <input name="base_price" type="number" @class(['form-control', 'is-invalid' => $errors->has('base_price')])
                                        placeholder="{{ __('base_price') }}" value="{{ old('base_price') }}" autofocus id="edit_price">
                                </div>
                                @error('base_price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label for="name">{{ __('Description') }}</label>
                                <div class="input-group">
                                    <textarea name="description" class="form-control" type="text" @class(['form-control', 'is-invalid' => $errors->has('description')])
                                        placeholder="{{ __('Description') }}" autofocus id="edit_description">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
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

            const tableInstance = window.LaravelDataTables['apartment_dataTable'] = $('#apartment_dataTable')
                .DataTable()
            tableInstance.on('draw.dt', function() {
                $('.viewBtn').click(function() {
                    fetch('/apartment/' + $(this).data('apartment'))
                        .then(response => response.json())
                        .then(apartment => {
                            console.log(apartment)
                            $('#view_name').val(apartment.name)
                            $('#view_price').val(apartment.base_price)
                            $('#view_description').val(apartment.description)
                            $('#view_address').val(apartment.address)
                        })
                })
                $('.editBtn').click(function() {
                    fetch('/apartment/' + $(this).data('apartment'))
                        .then(response => response.json())
                        .then(apartment => {
                            $('#edit_name').val(apartment.name)
                            $('#edit_price').val(apartment.base_price)
                            $('#edit_description').val(apartment.description)
                            $('#edit_address').val(apartment.address)
                            $('#update-form').attr('action', '/apartment/'+ $(this).data('apartment'));
                        })
                })

                $('.deleteBtn').click(function() {
                    $('#delete-form').attr('action', '/apartment/' + $(this).data('apartment'));
                });
            })
        })
    </script>
@endpush
