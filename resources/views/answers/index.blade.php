@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow text-center w-75 p-4 bd-main">
            <div>
                @foreach($questions as $question)
                    {{var_export($question->isTrue(request()[$question->id]))}}
                    <br>
                @endforeach
            </div>
        </div>
    </div>
@endsection
