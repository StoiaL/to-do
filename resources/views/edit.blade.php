<form method="POST" action="{{ route('todos.update', $todo) }}">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="title"
        value="{{ $todo->title }}"
    >

    <textarea name="description">{{ $todo->description }}</textarea>

    <button type="submit">
        Save Changes
    </button>

</form>
