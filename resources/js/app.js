const todos = document.querySelectorAll('.todo:not(.add-button)');

const title = document.getElementById('todo-title');
const description = document.getElementById('todo-description');
const box = document.getElementById('description-box');

const deleteButton = document.getElementById('delete-button');
const deleteForm = document.getElementById('delete-form');

let selectedTodo = null;

// Hide everything when the page loads
box.style.display = 'none';
deleteButton.style.display = 'none';

// When a todo is clicked
todos.forEach(todo => {

    todo.addEventListener('click', (event) => {

        event.stopPropagation();

        // Save the selected todo's id
        selectedTodo = todo.dataset.id;

        // Update the description box
        title.textContent = todo.dataset.title;
        description.textContent = todo.dataset.description;

        // Show description and delete button
        box.style.display = 'block';
        deleteButton.style.display = 'block';

    });

});

// Clicking outside hides everything
document.addEventListener('click', () => {

    selectedTodo = null;

    box.style.display = 'none';
    deleteButton.style.display = 'none';

});

// Prevent clicks inside the description box from closing it
box.addEventListener('click', (event) => {

    event.stopPropagation();

});

// Prevent clicking the delete button from closing everything
deleteButton.addEventListener('click', (event) => {

    event.stopPropagation();

    if (selectedTodo === null) {
        return;
    }

    deleteForm.action = '/todos/' + selectedTodo;

    deleteForm.submit();

});
