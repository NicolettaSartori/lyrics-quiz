@extends('layouts.app')

@section('content')
    @foreach($questions as $question)
        <div class="d-flex justify-content-center">
            <div class="card shadow text-center mb-4 w-75 p-4">
                <div class="card text-center mb-2 gr-acc">
                    <div class=" p-0 m-5">
                        <strong class="h4 h4-normal">{{$question->body}}</strong><br>
                    </div>
                </div>

                @foreach($question->answers as $answer)
                    <div class="gr-main-hv category card text-center mb-2">
                        <div class=" p-0 m-4">
                            <strong class="h4 h4-normal">{{$answer->body}}</strong><br>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
