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

        <div class="todo-list">

            @foreach($todos as $todo)

                <div
                    class="todo"
                    data-title="{{ $todo['title'] }}"
                    data-description="{{ $todo['description'] }}"
                >
                    {{ $todo['title'] }}
                </div>

            @endforeach

            <div class="todo add-button">
                + Add new To-Do
            </div>

        </div>

        <div class="description">

            <h2 id="todo-title">
                {{ $todos[0]['title'] }}
            </h2>

            <p id="todo-description">
                {{ $todos[0]['description'] }}
            </p>

        </div>

    </div>

</div>

</body>
</html>