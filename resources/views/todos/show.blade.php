@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center">
        <p class="h3 mb-0">{{ $todo->title }}</p>

        <div class="ml-auto">
            <div class="d-flex align-items-center justify-content-end">
                @can('update', $todo)
                    <a href="{{ route('todos.edit', $todo) }}" class="btn btn-warning">Редактировать</a>
                @endcan
                @can('delete', $todo)
                    <form action="{{ route('todos.destroy', $todo) }}" method="post">
                        @csrf @method('delete')
                        <button class="btn btn-danger">Удалить</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>

    <hr style="border-style: dashed;">

    <div class="mb-3 d-flex">
        <div>
            Автор - {{ $todo->user->name }}, {{ $todo->is_active ? 'Активно' : 'Не активно' }}
        </div>
        <div class="ml-auto">
            Создано: {{ $todo->created_at->diffForHumans() }}
        </div>
    </div>

    <div class="card card-body lead">
        {!! nl2br($todo->content) !!}
    </div>

@endsection
