<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>To-Do</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="container">

    <h1>My To-Dos</h1>

    <div class="content">

        <div class="todo-section">

            <div class="todo-list">

                @foreach($todos as $todo)

                    <table class="todo-table">

                        <tr>
                            <th>id</th>
                            <th>title</th>
                            <th>description</th>
                            <th>actions</th>
                        </tr>

                        <tr
                            class="todo"
                            data-id="{{ $todo->id }}"
                            data-title="{{ $todo->title }}"
                            data-description="{{ $todo->description }}"
                        >
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            <td>{{ $todo->description }}</td>
                            <td class="actions-cell">

                            <td class="actions-cell flex items-center justify-center gap-2">

                                <a
                                    href="{{ route('todos.edit', $todo) }}"
                                class =""
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('todos.destroy', $todo) }}"
                                    method="POST"
                                    style="display: inline;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button cursor-pointer"
                                    >
                                        Delete
                                    </button>
                                </form>

                                <button
                                    type="button"
                                    class=""
                                    data-id="{{ $todo->id }}"
                                >
                                    Comment
                                </button>
                            </td>
                        </tr>

                    </table>

                @endforeach

                <a href="{{ route('todos.create') }}" class="todo add-button">
                    + Add new To-Do
                </a>

            </div>

            <div class="more-todos" id="more-todos"></div>

        </div>

        <div class="description" id="description-box">

            <h2 id="todo-title"></h2>

            <textarea
                id="todo-description"
                class="todo-description-input"
            ></textarea>


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
