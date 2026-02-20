const todoForm = document.getElementById('todo-form');
const taskInput = document.getElementById('task-input');
const dateInput = document.getElementById('date-input');
const filterSelect = document.getElementById('filter-select');
const deleteAllBtn = document.getElementById('delete-all-btn');
const todoTbody = document.getElementById('todo-tbody');
const emptyState = document.getElementById('empty-state');
const todoTable = document.getElementById('todo-table');

let todos = [];

todoForm.addEventListener('submit', function (e) {
    e.preventDefault();

    const taskText = taskInput.value.trim();
    const dateValue = dateInput.value;

    if (!taskText || !dateValue) return;

    const newTodo = {
        id: Date.now(),
        task: taskText,
        dueDate: dateValue,
        status: 'pending'
    };

    todos.push(newTodo);

    taskInput.value = '';
    dateInput.value = '';

    renderTodos();
});

filterSelect.addEventListener('change', renderTodos);

deleteAllBtn.addEventListener('click', () => {
    todos = [];
    renderTodos();
});

function toggleStatus(id) {
    todos = todos.map(todo => {
        if (todo.id === id) {
            return { ...todo, status: todo.status === 'pending' ? 'completed' : 'pending' };
        }
        return todo;
    });
    renderTodos();
}

function deleteTodo(id) {
    todos = todos.filter(todo => todo.id !== id);
    renderTodos();
}

function renderTodos() {
    todoTbody.innerHTML = '';

    const filterValue = filterSelect.value;
    const filteredTodos = todos.filter(todo => {
        if (filterValue === 'all') return true;
        return todo.status === filterValue;
    });

    if (filteredTodos.length === 0) {
        emptyState.style.display = 'block';
        todoTable.style.display = 'none';
    } else {
        emptyState.style.display = 'none';
        todoTable.style.display = 'table';

        filteredTodos.forEach(todo => {
            const tr = document.createElement('tr');

            const tdTask = document.createElement('td');
            tdTask.textContent = todo.task;

            const tdDate = document.createElement('td');
            tdDate.textContent = todo.dueDate;

            const tdStatus = document.createElement('td');
            const statusBtn = document.createElement('button');
            statusBtn.textContent = todo.status;
            statusBtn.className = `status-btn ${todo.status}`;
            statusBtn.onclick = () => toggleStatus(todo.id);
            tdStatus.appendChild(statusBtn);

            const tdActions = document.createElement('td');
            const delBtn = document.createElement('button');
            delBtn.textContent = 'Delete';
            delBtn.className = 'delete-btn';
            delBtn.onclick = () => deleteTodo(todo.id);
            tdActions.appendChild(delBtn);

            tr.appendChild(tdTask);
            tr.appendChild(tdDate);
            tr.appendChild(tdStatus);
            tr.appendChild(tdActions);

            todoTbody.appendChild(tr);
        });
    }
}

renderTodos();