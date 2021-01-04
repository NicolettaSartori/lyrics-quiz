@extends('layouts.app')

@section('style')
    <link href="{{ asset('css/cat.css') }}" rel="stylesheet">
@endsection

@section('content') <!-- Create new nur bei Unterkategorien -->
    @if(!$is_super)
        <div class="d-flex justify-content-center">
            <a href="{{route('category.create', $super_category->id)}}" class="create card text-center mb-4 w-75 bd-acc">
                <div class="card-body card-body-top">
                    <strong class="h4 txt-acc-dark-i">Create new</strong>
                </div>
            </a>
        </div>
    @endif

    @foreach($categories as $category)
        <div class="d-flex justify-content-center">
            <a href="{{route('category', $category->id)}}" class="category card text-center mb-4 w-75">
                <img src="{{$category->path}}" class="rounded w-50 mx-auto d-block upload" alt="">
                <div class="card-body">
                    <strong class="h4 h4-normal">{{$category->body}}</strong><br>
                    <div class="txt-grey-i">Questions: {{$category->questions->count()}}</div>
                </div>
            </a>
        </div>
    @endforeach
@endsection
