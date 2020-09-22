@if($todos->isNotEmpty())

    @foreach($todos as $todo)
        @include('components.todo-card')
    @endforeach

    {{ $todos->links() }}

@else
    <div class="alert alert-secondary">
        Список дел пуст
    </div>
@endif
