<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoFormRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    protected $perPage = 5;

    public function index()
    {
        $todos = Todo::query()
            ->where('user_id', auth()->user()->id)
            ->latest()
            ->paginate($this->perPage);

        return view('todos.index', [
            'todos' => $todos
        ]);
    }


    public function create()
    {
        $this->authorize('create', Todo::class);
        return view('todos.form');
    }


    public function store(TodoFormRequest $request)
    {
        $this->authorize('create', Todo::class);
        $todo = auth()->user()->todos()->create($this->getData($request));
        return redirect()->route('todos.show', $todo);
    }


    public function show(Todo $todo)
    {
        $this->authorize('view', $todo);
        return view('todos.show', [
            'todo' => $todo
        ]);
    }


    public function edit(Todo $todo)
    {
        $this->authorize('update', $todo);
        return view('todos.form', [
            'todo' => $todo
        ]);
    }


    public function update(TodoFormRequest $request, Todo $todo)
    {
        $this->authorize('update', $todo);
        $todo->update($this->getData($request));
        return redirect()->route('todos.show', $todo);
    }


    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);
        $todo->delete();
        return redirect()->route('todos.index');
    }

    protected function getData(TodoFormRequest $request) {
        $data  = $request->validated();
        $data['is_active'] = $request['is_active'] ? true : false;
        return $data;
    }
}
