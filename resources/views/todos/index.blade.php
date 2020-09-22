@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center mb-3">

        <h1 class="h3 mb-0">
            Список дел
        </h1>

        @can('create', App\Models\Todo::class)
            <a href="{{ route('todos.create') }}" class="ml-auto btn btn-success">
                Добавить дело
            </a>
        @endcan

    </div>

    <div class="row">

        <div class="col-md-9">

            @include('components.todos-list')

        </div>

        <div class="col-md-3">

        </div>

    </div>

@endsection
