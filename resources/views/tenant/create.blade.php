@extends('layouts.app')

@section('content')
    <div class="container-fluid card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>New Tenant</div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
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
                        <!-- Occupation -->
                        <div class="form-group mt-3">
                            <label for="name">{{ __('Occupation') }}</label>
                            <div class="input-group">
                                <input name="occupation" type="text" @class(['form-control', 'is-invalid' => $errors->has('occupation')])
                                    placeholder="{{ __('occupation') }}" value="{{ old('occupation') }}" autofocus>
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
                    <div class="col">
                        <div class="form-group mt-3 mb-3">
                            <label for="name">{{ __('Apartment Type') }}</label>
                            <div class="input-group">
                                <select class="selectpicker" multiple aria-label="Default select example"
                                    data-live-search="true">
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                    <option value="4">Four</option>
                                </select>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
