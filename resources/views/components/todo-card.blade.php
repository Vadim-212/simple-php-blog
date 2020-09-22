<div class="card card-body mb-3">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('todos.show', $todo) }}">
            <h2 class="h5 mb-0">{{ $todo->title }}</h2>
        </a>

        <div class="d-flex align-items-center justify-content-end">
            @can('update', $todo)
                <a href="{{ route('todos.edit', $todo) }}" class="mt-3 btn btn-warning btn-sm">
                    Редактировать
                </a>
            @endcan
            @can('delete', $todo)
                <form action="{{ route('todos.destroy', $todo) }}" method="post">
                    @csrf @method('delete')
                    <button class="ml-2 mt-3 btn btn-danger btn-sm">
                        Удалить
                    </button>
                </form>
            @endcan
        </div>
    </div>

    <p class="mb-0">{{ Str::words($todo->content, 22) }}</p>

    <div class="text-right">
        <a class="btn btn-primary" href="{{ route('todos.show', $todo) }}">
            Подробнее...
        </a>
    </div>

</div>
