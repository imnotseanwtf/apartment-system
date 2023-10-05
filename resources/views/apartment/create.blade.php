@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('apartments.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {{-- <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile" name="picture">
                            </div> --}}
                            <div class="mb-3">
                                <label for="">Amenties</label>
                                <input class="form-control" type="text" placeholder="Default input"
                                    aria-label="default input example" name="amenities">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            </div>

                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="">Name</label>
                                <input class="form-control" type="text" placeholder="Default input"
                                    aria-label="default input example" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="">Class</label>
                                <input class="form-control" type="text" placeholder="Default input"
                                    aria-label="default input example" name="class">
                            </div>
                            <div class="mb-3">
                                <label for="">Apartment No.</label>
                                <input class="form-control" type="number" placeholder="Default input"
                                    aria-label="default input example" name="roomnum">
                            </div>
                            <div class="mb-3">
                                <label for="">Location</label>
                                <input class="form-control" type="text" placeholder="Default input"
                                    aria-label="default input example" name="location">
                            </div>
                            <button class="btn btn-primary " style="float: right;">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script></script>
@endsection
