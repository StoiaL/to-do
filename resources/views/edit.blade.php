<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit To-Do</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<div class="todo-form-container">

    <h1>Edit To-Do</h1>

    <form
        method="POST"
        action="{{ route('todos.update', $todo) }}"
    >

        @csrf

        @method('PUT')

        <div class="todo-form-group">

            <label for="title">
                Title
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ $todo->title }}"
                required
            >

        </div>


        <div class="todo-form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
            >{{ $todo->description }}</textarea>

        </div>


        <div class="todo-form-buttons">

            <a
                href="{{ route('todos.index') }}"
                class="todo-cancel-button"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="todo-save-button"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>

</body>

</html>
