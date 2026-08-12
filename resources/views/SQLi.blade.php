<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SQL Injection Lab</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<div class="sqli-container">

    <h1>SQL Injection Lab</h1>

    <p>
        This page intentionally uses unsafe SQL.
    </p>

    <form method="POST" action="{{ route('sqli.execute') }}">

        @csrf

        <label for="sql">
            SQL command
        </label>

        <textarea
            name="sql"
            id="sql"
            placeholder="Enter SQL here..."
        >{{ old('sql') }}</textarea>

        <button type="submit">
            Execute SQL
        </button>

    </form>

    @if(isset($results))

        <h2>Results</h2>

        <div class="sqli-results">

            @if(count($results) === 0)

                <p>No results.</p>

            @else

                @foreach($results as $row)

                    <pre>{{ json_encode($row, JSON_PRETTY_PRINT) }}</pre>

                @endforeach

            @endif

        </div>

    @endif

    @if(isset($sql))

        <h2>Generated SQL</h2>

        <pre>{{ $sql }}</pre>

    @endif

    @if(isset($message))

        <div class="sqli-message">
            {{ $message }}
        </div>

    @endif

    @if(isset($error))

        <div class="sqli-error">
            {{ $error }}
        </div>

    @endif

</div>

</body>

</html>
