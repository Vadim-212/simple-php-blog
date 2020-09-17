@extends('layouts.app')

@section('content')

    <div class="d-flex align-items-center mb-3">

        <h1 class="h3 mb-0">
            Посты
        </h1>

        @can('create', App\Models\Post::class)
            <a href="{{ route('posts.create') }}" class="ml-auto btn btn-success">
                Добавить пост
            </a>
        @endcan

    </div>

    <div class="row">
        <div class="col-md-9">

            @if($posts->isNotEmpty())
                @foreach($posts as $post)
                    <div class="card card-body">
                        <a href="{{ route('posts.show', $post) }}">
                            <p class="h5 mb-3">{{ $post->title }}</p>
                        </a>
                        <p class="mb-0">{{ Str::words($post->content, 20) }}</p>

                        <div class="d-flex align-items-center justify-content-end">
                            @can('update', $post)
                                <a class="btn btn-warning mt-3 btn-sm" href="{{ route('posts.edit', $post) }}">Редактировать</a>
                            @endcan
                            @can('delete', $post)
                                <form action="{{ route('posts.destroy', $post) }}" method="post" class="">
                                    @csrf @method('delete')
                                    <button class="ml-2 mt-3 btn btn-danger btn-sm">Удалить</button>
                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}

            @else
                <div class="alert alert-secondary">
                    Постов нет :(
                </div>
            @endif
        </div>
        <div class="col-md-3">

        </div>
    </div>

@endsection
