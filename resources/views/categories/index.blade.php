@extends('layouts.app')

@section('content')
    @if(!$is_super)
        <div class="d-flex justify-content-center">
            <a href="{{route('category.create', $super_category->id)}}"
               class="gr-acc-hv card text-center shadow mb-4 w-75 bd-acc">
                <div class="p-0 m-4">
                    <strong class="h4 txt-acc-dark-i">Create new</strong>
                </div>
            </a>
        </div>
    @endif

    @foreach($categories as $category)
        <div class="d-flex justify-content-center">
            @if($is_super)
                <a href="{{route('category', $category->id)}}" class="gr-main-hv card text-center shadow mb-4 w-75">
                    @else
                        <a href="{{route('category.show', [
                        'super_category' => $super_category->id,
                        'category' => $category->id])}}"
                           class="gr-main-hv card text-center mb-4 w-75 shadow">
                            @endif
                            <div class="p-0 m-4-tb">
                                <img src="{{$category->path}}" class="rounded w-50 mx-auto d-block m-1-b" alt="">
                                <strong class="h4 h4-normal m-2">{{$category->body}}</strong><br>
                                @if(!$is_super)
                                <div class="txt-grey-i">Questions: {{$category->questions->count()}}</div>
                                @endif
                            </div>
                        </a>
        </div>
    @endforeach
@endsection
