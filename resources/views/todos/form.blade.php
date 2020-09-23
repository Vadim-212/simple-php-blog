<?php
    $todo = $todo ?? null;
?>

@extends('layouts.app')

@section('content')

    <div class="h3">
        {{ $todo ? 'Редактирование задачи' : 'Создание задачи' }}
    </div>

    <div class="row">
        <div class="col-mb-4">
            <form action="{{ $todo ? route('todos.update', $todo) : route('todos.store') }}"
                  class="card card-body" method="post">
                @csrf
                @if($todo) @method('put') @endif
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title"
                           class="form-control @error('title') is-invalid @enderror"
                           placeholder="Введите заголовок..." value="{{ old('title', $todo->title ?? null)  }}">
                    @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">Текст</label>
                    <textarea class="form-control"
                              name="content" id="content" rows="10" cols="50"
                              placeholder="Что требуется сделать?">{{ old('content', $todo->content ?? null) }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror"
                           id="is_active" name="is_active"
                        {{ old('is_active') ? 'checked="checked"' : '' }}>
                    <label class="form-check-label" for="is_active">Активно</label>
                    @error('is_active')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary">{{ $todo ? 'Изменить' : 'Добавить' }}</button>

            </form>
        </div>
    </div>

@endsection
