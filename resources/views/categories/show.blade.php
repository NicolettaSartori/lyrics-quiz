@extends('layouts.app')

@section('content')
    @foreach($questions as $question)
        <div class="d-flex justify-content-center">
            <div class="category card text-center mb-4 w-75">
                <div class="card-body">
                    <strong class="h4 h4-normal">{{$question->body}}</strong><br>
                </div>
            </div>
        </div>
    @endforeach
@endsection
