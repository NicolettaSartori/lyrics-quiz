@extends('layouts.app')

@section('content')
    <!-- Name Kategory und kurze Beschreibung was man machen soll -->

    <form method="post" action="{{route('answer')}}">
        @csrf
        @foreach($questions as $question)
            <div class="d-flex justify-content-center">
                <div class="card shadow text-center mb-4 w-75 p-4 bd-main">
                    <div class="card text-center mb-2 bg-acc-light-1 gr-main">
                        <div class=" p-0 m-5">
                            <strong class="h4 h4-normal">{{$question->body}}</strong><br>
                        </div>
                    </div>

                    @foreach($question->answers as $answer)
                        <label>
                            <input type="radio" class="d-none radio-card" name="answers" id="{{$answer->id}}" value="{{$answer->id}}">
                            <span class="gr-main-hv category card card-p text-center mb-2 answer">
                                <span class=" p-0 m-4">
                                    <strong class="h4 h4-normal">{{$answer->body}}</strong><br>
                                </span>
                            </span>
                        </label>
                    @endforeach
                </div>
            </div>
        @endforeach

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-acc w-50 p-3 m-4 shadow">Next</button>
        </div>
    </form>
@endsection
