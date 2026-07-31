<form action="/todos" method="POST">
    @csrf

    <label for="title">Title</label>
    <input
        type="text"
        id="title"
        name="title"
        placeholder="Enter the title"
    >

    <br><br>

    <label for="description">Description</label>
    <textarea
        id="description"
        name="description"
        placeholder="Enter the description"
    ></textarea>

    <br><br>

    <button type="submit">
        Save Todo
    </button>
</form>
