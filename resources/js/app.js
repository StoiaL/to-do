const todoCards = document.querySelectorAll(".todo:not(.add-button)");

const title = document.getElementById("todo-title");

const description = document.getElementById("todo-description");

todoCards.forEach(card => {

    card.addEventListener("mouseenter", () => {

        title.textContent = card.dataset.title;

        description.textContent = card.dataset.description;

    });

});