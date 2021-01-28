@extends('layouts.app')

@section('head')
    <script src="https://kit.fontawesome.com/5413d9eb26.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <div class="text-center">
        <div class="m-5">
            <h1>Start your Quiz</h1>
            <h3>Do you know all the lyrics?</h3>
        </div>
        <div class="d-flex justify-content-center">
            <a class="col-sm-4 col-lg-2 btn-acc card p-3 w-50 shadow h5" href="{{ route('super-category') }}">Let's find out <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
@endsection
