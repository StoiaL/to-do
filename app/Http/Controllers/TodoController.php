<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateToDoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $todos = Todo::all();

        return view('TodoIndex', compact('todos'));
    }

    public function store(CreateTodoRequest $request)
    {
        Todo::query()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);



        return redirect(route('todos.index'));
    }


    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect('/todos');
    }

    public function create()
    {
        return view('create');
    }

    public function update(CreateToDoRequest $request, Todo $todo)
    {
        $validated = $request->validated();
        $todo->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        return view('edit', [
            'todo' => $todo
        ]);

    }

}
