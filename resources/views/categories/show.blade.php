@extends('layouts.app')

@section('head')
    <script src="https://kit.fontawesome.com/5413d9eb26.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    <h1 class="text-center mb-4">{{ $category->body }}</h1>

    {{--Create new button--}}
    @if(Gate::check('view-category', $category))
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-center">
                    <a href="{{route('question.create', [
                        'super_category' => $super_category->id,
                        'category' => $category->id])}}"
                       class="card text-center shadow mb-4 w-75 btn-acc">
                        <div class="p-0 m-4">
                            <strong class="h4 txt-acc-dark-i">Create new</strong>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <form method="post" action="{{route('answer', $category)}}">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="col-lg-8 ">
                <div class="d-flex justify-content-center">
                    <div class="row w-75">
                @foreach($questions as $question)

                        {{--Card--}}
                        <div class="card shadow text-center mb-4 w-100 p-0 bd-main">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item p-4">

                                    {{--Question--}}
                                    <div class="card text-center mb-2 bg-acc-light-1 gr-main mb-4">
                                        <div class=" p-0 m-5">
                                            <strong class="h4 h4-normal">{{$question->body}}</strong><br>
                                        </div>
                                    </div>

                                    {{--Answers--}}
                                    <div class="d-flex justify-content-center">
                                        <div class="row w-100">
                                            @foreach($question->answers as $answer)
                                                    <div class="col-md-6">
                                                <label class="w-100">
                                                    <input type="radio" class="d-none radio-card" name="{{$question->id}}" id="{{$answer->id}}" value="{{$answer->id}}">
                                                    <span class="gr-main-hv category card card-p text-center mb-2 answer">
                                                        <span class=" p-0 m-4">
                                                            <strong class="h5">{{$answer->body}}</strong><br>
                                                        </span>
                                                    </span>
                                                </label>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>

                                {{--Trashcan--}}
                                @if( Gate::check('view-category', $category))
                                    <li class="list-group-item p-0">
                                        <button type="button" data-toggle="modal" data-target="#modal{{ $question->id }}"
                                                class="txt-dark-light bg-light-dark p-3 rounded destroy w-100 btn-nothing bg-light-dark-hv">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </li>

                                    {{--Modal--}}
                                    <div class="modal fade" id="modal{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <div class="d-flex justify-content-between align-items-center w-100">
                                                        <div class="txt-light-light-i">not her</div>
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                        <button type="button" class="close m-0" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-main" data-dismiss="modal">No</button>
                                                    <a href="{{ route('question.destroy', [
                                                    'super_category' => $super_category->id,
                                                    'category' => $category->id,
                                                    'question' => $question->id]) }}">
                                                        <div class="btn btn-acc">Yes</div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </ul>
                        </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{--Next button--}}
        @if($questions->count()>0)
            <div class="d-flex justify-content-center">
                <button type="submit" class="col-sm-4 col-lg-2 btn btn-acc w-50 p-3 m-4 shadow">Next</button>
            </div>
        @endif
    </form>
@endsection
