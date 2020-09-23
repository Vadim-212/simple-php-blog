@extends('layouts.app')

@section('content')
    <div class="d-flex align-items-center mb-3">

        <h1 class="h1 mb-0">
            Index
        </h1>

    </div>

    <div class="row">

        <div class="col-md-9">

            <a class="card card-body mb-3 main-page-link" href="{{ route('posts.index') }}">
                <div class="h4">
                    Посты
                </div>
            </a>
            @auth
            <a class="card card-body mb-3 main-page-link" href="{{ route('todos.index') }}">
                <div class="h4">
                    Список дел
                </div>
            </a>
            @endauth

        </div>

        <div class="col-md-3">

        </div>

    </div>

@endsection
