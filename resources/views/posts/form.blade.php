<?php
    $post = $post ?? null;
?>

@extends('layouts.app')

@section('content')

    <div class="h3">
        {{ $post ? 'Редактирование поста' : 'Новый пост' }}
    </div>

    <div class="row">
        <div class="col-mb-4">
            <form action="{{ $post ? route('posts.update', $post) : route('posts.store') }}"
                  class="card card-body" method="post">
                @csrf
                @if($post) @method('put') @endif
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           placeholder="Введите заголовок..." value="{{ old('title', $post->title ?? null)  }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select id="category_id" class="form-control @error('title') is-invalid @enderror"
                            name="category_id">
                        @foreach($categories as $category)
                            <option {{ old('category_id', $post->category_id ?? null) == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="form-group">
                        <label for="content">Пост</label>
                        <textarea class="form-control"
                                  name="content" id="content" rows="10"
                                  placeholder="Текст поста...">{{ old('content', $post->content ?? null) }}</textarea>
                    </div>
                </div>
                <button class="btn btn-primary">{{ $post ? 'Изменить' : 'Добавить' }}</button>

            </form>
        </div>
    </div>

@endsection
