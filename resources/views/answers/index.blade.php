@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow w-75 p-4 bd-main">
            <div>
                <h3>Resolution</h3>
                <h5>{{$category->countTrue(request()->all())}}/{{$questions->count()}} correct</h5>

                @foreach($questions as $question)
                    @if($question->isTrue(request()[$question->id]))
                        {{'True' . $question->body}}
                    @else
                        {{'false' . $question->body}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
