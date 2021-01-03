@extends('layouts.app')

@section('content')
    @foreach($categories as $category)
        <figure class="text-center">
            <img src="{{$category->path}}" class="figure-img img-fluid rounded w-25">
            <figcaption class="figure-caption">
                {{$category->body}}
            </figcaption>
        </figure>
    @endforeach
@endsection
