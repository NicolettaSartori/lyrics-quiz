@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="d-flex justify-content-center">
                <div class="card w-75 shadow bd-acc-dark">
                    <div class="card-header text-center bg-acc-light-1 p-3">
                        <h4 class="m-0">Create new Category</h4>
                    </div>
                    <form class="card-body" method="post" action="{{ route('category.store', $super_category->id) }}">
                        @csrf
                        <input type="text" class="form-control" placeholder="Name" name="body">
                        <div class="d-flex justify-content-center">
                            <div class="card btn-main shadow w-75 m-4 card-p">
                                <button type="submit" class="btn-nothing p-2 txt-dark-light">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
