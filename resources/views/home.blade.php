@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div>Welcome!</div>
            </div>
            <div class="card-body">
                <h5 class="p-2">Available Unit</h5>
                <div class="row">
                    <div class="col-4">
                        <div class="card">
                            <div class="card-header">
                                <img src="{{ asset('/images/sample/379482103.jpg') }}" alt="" class="card-img-top">
                            </div>
                            <div class="card-body">
                                <label for="">Unit 1</label>
                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Et porro aliquam corporis
                                    eveniet facere corrupti, mollitia earum. Ratione atque delectus harum voluptates
                                    assumenda animi. Facilis accusantium beatae id nihil nemo.</p>
                            </div>
                            <div class="card-footer text-end">
                                <button class="btn btn-primary">Visit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
