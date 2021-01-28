@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="d-flex justify-content-center">
                {{--Card--}}
                <div class="card w-75 shadow bd-acc-dark">
                    <div class="card-header text-center bg-acc-light-1 p-3">
                        <h4 class="m-0">Create new Question</h4>
                    </div>

                    {{--Forms--}}
                    <form class="card-body" method="post" action="{{ route('question.store', [
                        'super_category' => $super_category->id,
                        'category' => $category->id]) }}">
                        @csrf

                        {{--Question--}}
                        <label class="w-100">
                            <input type="text" class="form-control p-4 mb-4" placeholder="Lyrics" name="question">
                        </label>

                        {{--Answers--}}
                        <div class="w-100">
                            @for($i = 1; $i < 5; $i++)
                                <div class="d-flex align-items-center">
                                    <h6 style="margin-right: 1rem">
                                        {{ $i }}:
                                    </h6>
                                    <label style="width: 95%">
                                        <input type="text" class="form-control p-4 m-2-tb" placeholder="Who {{ $i }}" name="answer{{ $i }}">
                                    </label>
                                </div>
                            @endfor
                        </div>

                        {{--DropDown--}}
                        <label for="right">Right answer:</label>
                        <select class="form-control" name="right" id="right">
                            @for($i = 1; $i < 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>

                        {{--Submit--}}
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
