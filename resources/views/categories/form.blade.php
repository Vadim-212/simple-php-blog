<?php
    $category = $category ?? null;
?>

@extends('layouts.app')

@section('content')

    <div class="h3 mb-3">
        {{ $category ? 'Редактировать категорию' : 'Новая категория' }}
    </div>

    <div class="row">
        <div class="col-md-4">

            <form class="card card-body"
                  action="{{ $category ? route('categories.update', $category) : route('categories.store') }}"
                  method="post">
                @csrf
                @if($category)
                    @method('put')
                @endif
                <div class="form-group">
                    <label for="name">Название</label>
                    <input id="name" name="name" type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Введите имя..." value="{{ old('name', $category->name ?? null) }}">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary">{{ $category ? 'Изменить' : 'Добавить' }}</button>
            </form>
        </div>
    </div>

@endsection
