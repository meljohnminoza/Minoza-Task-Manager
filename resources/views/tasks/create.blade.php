<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Add New Task</h1>
        <p>Create a new task and keep track of your work.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Task Name</label>
                <input type="text" name="task_name" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description"></textarea>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label>Due Date</label>
                <input type="date" name="due_date">
            </div>

            <button type="submit" class="btn btn-primary">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}" class="back-link">
                Back to Tasks
            </a>

        </form>

    </div>

</div>

</body>
</html>