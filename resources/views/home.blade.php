<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>To-Do</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<div class="home-container">

    <a href="{{ route('todos.index') }}" class="home-button">
        My To-Dos
    </a>

</div>

</body>
</html>
