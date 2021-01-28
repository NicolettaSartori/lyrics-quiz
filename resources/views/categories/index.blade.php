@extends('layouts.app')

@section('head')
    <script src="https://kit.fontawesome.com/5413d9eb26.js" crossorigin="anonymous"></script>
@endsection

@section('content')
    @if(!$is_super)
        @auth
            <div class="d-flex justify-content-center">
                <a href="{{route('category.create', $super_category->id)}}"
                   class="card text-center shadow mb-4 w-75 btn-acc">
                    <div class="p-0 m-4">
                        <strong class="h4 txt-acc-dark-i">Create new</strong>
                    </div>
                </a>
            </div>
        @endauth
    @endif

    <div class="d-flex justify-content-center">
    <div class="row w-75">
    @foreach($categories as $category)
        @if($is_super || $category->questions->count() > 0 || Gate::check('view-category', $category))
            <div class="col-md-6">
                <div class="bd-main-light-hv card text-center mb-4 w-100 shadow">
                    <ul class="list-group list-group-flush">
                        @if($is_super)
                            <a class="p-0 m-0-tb w-100 h-100" href="{{route('category', $category->id)}}">
                        @else
                            <a class="p-0 m-0-tb w-100 h-100" href="{{route('category.show', [
                                'super_category' => $super_category->id,
                                'category' => $category->id])}}">
                        @endif
                                <li class="list-group-item gr-main-hv p-3">
                                    @if($is_super)
                                        <img src="{{$category->path}}" class="rounded w-75 mx-auto d-block m-1-b img" alt="">
                                    @else
                                        <img src="{{$category->path}}" class="rounded w-75 mx-auto d-block m-1-b" alt="">
                                    @endif
                                    <strong class="h4 h4-normal m-2">{{$category->body}}</strong><br>
                                    @if(!$is_super)
                                        <div class="txt-grey-i">Questions: {{$category->questions->count()}}</div>
                                    @endif

                                </li>
                            </a>

                        @if(!$is_super && Gate::check('view-category', $category))
                            {{--Trashcan--}}
                            <li class="list-group-item p-0">
                                <button type="button" data-toggle="modal" data-target="#modal{{ $category->id }}"
                                        class="txt-dark-light bg-light-dark p-2 rounded destroy w-100 btn-nothing bg-light-dark-hv">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </li>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <form action="{{ route('category.destroy', [
                                            'super_category' => $super_category->id,
                                            'category' => $category->id]) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-acc">Yes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        @endif
    @endforeach
    </div>
    </div>
@endsection
