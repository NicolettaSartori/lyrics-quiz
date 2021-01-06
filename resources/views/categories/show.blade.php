@extends('layouts.app')

@section('content')
    @foreach($questions as $question)
        <div class="d-flex justify-content-center">
            <div class="category card shadow text-center mb-4 w-75">
                <div class=" p-0 m-5">
                    <strong class="h4 h4-normal">{{$question->body}}</strong><br>
                </div>
                <!-- insert answers-->
            </div>
        </div>
    @endforeach
@endsection
