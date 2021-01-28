@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="d-flex justify-content-center">
                <div class="card shadow w-75 p-4 bd-main mb-4">
                    <div>
                        <h3>Resolution</h3>
                        <h5>{{ $category->countTrue(request()->all()) }}/{{ $questions->count() }} correct</h5>

                        @foreach($questions as $question)
                            @if($question->isTrue(request()[$question->id]))
                               <div class="rounded p-3 mb-2 bg-acc-light-1">
                                   {{ $question->body }} <br>
                                   <i>Your answer: </i>{{ $question->trueAnswer()->body }}
                                </div>
                            @else
                                <div class="rounded p-3 mb-2 bg-main-light-1">
                                    {{ $question->body }} <br>
                                    <i>Your answer: </i>
                                    @if(request()[$question->id]!=null)
                                        {{ $question->getAnswer(request()[$question->id])->body }}
                                    @endif
                                    <br>
                                    <i>Right answer: </i>{{ $question->trueAnswer()->body }}
                                </div>
                            @endif
                        @endforeach

                        <div class="d-flex justify-content-center">
                            <a class="card btn-acc shadow w-75 p-3 m-2 text-center" href="{{ route('super-category') }}">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
