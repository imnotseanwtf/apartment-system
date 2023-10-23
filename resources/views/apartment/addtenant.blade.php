@extends('layouts.app')

@section('content')
    <div class="container-fluid card mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>Unit</div>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="container">
                            <div id="imageCarousel" class="carousel slide">
                                <div class="carousel-inner">
                                    <!-- Add your images as carousel items -->
                                    <div class="carousel-item active">
                                        <img src="{{ asset('images/brand/download.png') }}"
                                            class="d-block w-100 img-thumbnail " alt="Image 1" style="height: 400px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('images/brand/download2jpg.jpg') }}"
                                            class="d-block w-100 img-thumbnail " alt="Image 2" style="height: 400px">
                                    </div>
                                    <!-- Add more items as needed -->
                                </div>
                                <!-- Add navigation controls -->
                                <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
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
                    <hr>
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>Tenant</div>
                    </div>
                    <div class="col-6">
                        <div class="form-group mt-3 mb-3">
                            <label for="name">{{ __('Name') }}</label>
                            <div class="input-group">
                                <input name="email" type="text" @class(['form-control', 'is-invalid' => $errors->has('name')])
                                    placeholder="{{ __('Name') }}" value="{{ old('name') }}" autofocus>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="number">{{ __('Number') }}</label>
                            <div class="input-group">
                                <input name="number" type="number" @class(['form-control', 'is-invalid' => $errors->has('number')])
                                    placeholder="{{ __('Name') }}" value="{{ old('number') }}" autofocus>
                            </div>
                            @error('number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="occupation">Occupation</label>
                            <div class="input-group">
                                <input type="text" name="occupation" id="occupation"
                                    class="form-control"@class(['form-control', 'is-invalid' => $errors->has('email')]) placeholder="{{ __('Occupation') }}"
                                    value="{{ old('occupation') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="email">Email</label>
                            <div class="input-group">
                                <input name="email" type="email" @class(['form-control', 'is-invalid' => $errors->has('email')])
                                    placeholder="{{ __('Email') }}" value="{{ old('number') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="picture">Picture</label>
                            <input type="file" class="form-control" id="picture" name="picture">
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="id_picture">ID Picture</label>
                            <input type="file" class="form-control" id="idPicture" name="id_picture">
                        </div>

                    </div>

                    <div class="col-6">
                        <div class="form-group mt-3 mb-3">
                            <label for="down_payment">{{ __('Down Payment') }}</label>
                            <div class="input-group">
                                <input name="down_payment" type="number" @class(['form-control', 'is-invalid' => $errors->has('down_payment')])
                                    placeholder="{{ __('Down Payment') }}" value="{{ old('down_payment') }}" autofocus>
                            </div>
                            @error('down_payment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="advance_deposit">{{ __('Advance Deposit') }}</label>
                            <div class="input-group">
                                <input name="advance_deposit" type="number" @class([
                                    'form-control',
                                    'is-invalid' => $errors->has('advance_deposit'),
                                ])
                                    placeholder="{{ __('Advance Deposit') }}" value="{{ old('advance_deposit') }}"
                                    autofocus>
                            </div>
                            @error('advance_deposit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <label for="security_deposit">{{ __('Security Deposit') }}</label>
                            <div class="input-group">
                                <input name="security_deposit" type="number" @class([
                                    'form-control',
                                    'is-invalid' => $errors->has('security_deposit'),
                                ])
                                    placeholder="{{ __('Advance Deposit') }}" value="{{ old('security_deposit') }}"
                                    autofocus>
                            </div>
                            @error('security_deposit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </form>
            <div class="card-footer">

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mySwiper = new Swiper('#imageCarousel', {
                // Optional parameters
                loop: true,
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.carousel-control-next',
                    prevEl: '.carousel-control-prev',
                },
            });
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection
