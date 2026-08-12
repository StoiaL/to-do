const todos = document.querySelectorAll('.todo:not(.add-button)');

const title = document.getElementById('todo-title');
const description = document.getElementById('todo-description');
const box = document.getElementById('description-box');

const deleteButton = document.getElementById('delete-button');
const deleteForm = document.getElementById('delete-form');


const todoList = document.querySelector('.todo-list');
const moreTodos = document.getElementById('more-todos');


function updateMoreTodos() {

    const todos = document.querySelectorAll('.todo:not(.add-button)');

    let hiddenTodos = 0;

    todos.forEach(todo => {

        const listTop = todoList.getBoundingClientRect().top;
        const listBottom = todoList.getBoundingClientRect().bottom;

        const todoTop = todo.getBoundingClientRect().top;
        const todoBottom = todo.getBoundingClientRect().bottom;

        // Todo is completely below the visible list
        if (todoTop >= listBottom) {
            hiddenTodos++;
        }

    });

    if (hiddenTodos > 0) {
        moreTodos.textContent = `+${hiddenTodos} more`;
    } else {
        moreTodos.textContent = '';
    }
}

updateMoreTodos();

todoList.addEventListener('scroll', updateMoreTodos);

let selectedTodo = null;

// Hide everything when the page loads
box.style.display = 'none';
deleteButton.style.display = 'none';

// When a todo is clicked
todos.forEach(todo => {

    todo.addEventListener('click', (event) => {

        event.stopPropagation();

        // Save the selected todo's id
        selectedTodo = todo;

        // Update the description box
        title.textContent = todo.dataset.title;
        description.value = todo.dataset.description;

        // Show description and delete button
        box.style.display = 'block';
        deleteButton.style.display = 'block';

    });

});

// Clicking outside hides everything
document.addEventListener('click', () => {
    saveDescription();
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

    deleteForm.action = '/todos/' + selectedTodo.dataset.id;

    deleteForm.submit();

});


//functie de save descriere
async function saveDescription() {

    if (!selectedTodo) {
        return;
    }

    const id = selectedTodo.dataset.id;

    try {

        const response = await fetch('/todos/' + id, {

            method: 'PUT',

            headers: {
                'Content-Type': 'application/json',

                'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content,

                'Accept': 'application/json'
            },

            body: JSON.stringify({
                description: description.value
            })

        });

        if (!response.ok) {
            throw new Error('Failed to save Todo');
        }

        selectedTodo.dataset.description = description.value;

        console.log('Description saved!');

    } catch (error) {

        console.error('Error saving description:', error);

    }
}

description.addEventListener('blur', () => {    //save cand apasa inafara

    saveDescription();

});


description.addEventListener('keydown', (event) => {    //save si cand apasa enter

    if (event.key === 'Enter' && !event.shiftKey) {

        event.preventDefault();

        description.blur();

    }

});





