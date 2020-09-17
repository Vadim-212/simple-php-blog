@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center">
        <p class="h3 mb-0">{{ $post->title }}</p>

        <div class="ml-auto">
            <div class="d-flex align-items-center justify-content-end">
                @can('update', $post)
                    <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Редактировать</a>
                @endcan
                @can('delete', $post)
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
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
            Автор - {{ $post->user->name }}
        </div>
        <div class="ml-auto">
            Создано: {{ $post->created_at->diffForHumans() }}
        </div>
    </div>

    <div class="card card-body lead">
        {!! nl2br($post->content) !!}
    </div>

    <hr style="border-style: dashed;">

    <div class="d-flex justify-content-end">
        <a href="№" class="btn">
            Понравилось - {{ $post->likes()->count()}}
        </a>
        @auth
        <form action="{{ route('likes.toggle', $post) }}" method="post">
            @csrf @method('put')
            <button class="btn @if($post->isLikedBy(auth()->user())) btn-secondary @else btn-primary @endif">Нравится</button>

        </form>
        @endauth

    </div>

@endsection
