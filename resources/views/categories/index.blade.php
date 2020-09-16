@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center">
        <div class="h3">Категории {{ $user->name }}</div>

        @can('create', \App\Models\Category::class)
            <a href="{{ route('categories.create') }}" class="btn btn-success ml-auto">Добавить категорию</a>
        @endcan
    </div>

    @if($categories->isNotEmpty())
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="card card-body">
                        <div class="mb-3">
                            {{ $category->name }}
                        </div>
                        <div class="d-flex align-items-center justify-content-end">
                            @can('update', $category)
                            <a href="{{ route('categories.edit', $category) }}" class="mt-3 btn btn-warning btn-sm">Ред.</a>
                            @endcan
                            @can('delete', $category)
                            <form action="{{ route('categories.destroy', $category) }}" method="post">
                                @csrf @method('delete')
                                <button class="mt-3 btn btn-danger btn-sm">Удалить</button>
                            </form>
                            @endcan
                        </div>
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
