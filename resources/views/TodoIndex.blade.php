<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container">

    <h1>My To-Dos</h1>

    <div class="content">

        <div class="actions">
            <button id="delete-button" style="display:none;">
                🗑️
            </button>
        </div>

        <div class="todo-list">

            @foreach($todos as $todo)

                <div
                    class="todo"
                    data-id="{{ $todo->id }}"
                    data-title="{{ $todo->title }}"
                    data-description="{{ $todo->description }}"
                >
                    {{ $todo->title }}
                </div>

            @endforeach

            <a href="{{ route('todos.create') }}" class="todo add-button">
                + Add new To-Do
            </a>

        </div>

        <div class="description" id="description-box">
            <h2 id="todo-title"></h2>
            <p id="todo-description"></p>
        </div>

    </div>

</div>

</body>

<form
    id="delete-form"
    method="POST"
>
    @csrf
    @method('DELETE')
</form>

</html>
