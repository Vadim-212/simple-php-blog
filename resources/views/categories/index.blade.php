@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center">
        <div class="h3">Категории {{ $user->name }}</div>

        @if(auth()->id() == $user->id)
            <a href="{{ route('categories.create') }}" class="btn btn-success ml-auto">Добавить категорию</a>
        @endif
    </div>

    @if($categories->isNotEmpty())
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="card card-body">
                        {{ $category->name }}
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-secondary">
            Категорий нет.
        </div>
    @endif
@endsection
