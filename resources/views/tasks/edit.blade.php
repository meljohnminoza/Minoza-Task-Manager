<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Edit Task</h1>
        <p>Update the details of your task.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('tasks.update', $task) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Task Name</label>
                <input
                    type="text"
                    name="task_name"
                    value="{{ $task->task_name }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description">{{ $task->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Status</label>

                <select name="status">

                    <option value="Pending"
                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label>Due Date</label>

                <input
                    type="date"
                    name="due_date"
                    value="{{ $task->due_date }}"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Update Task
            </button>

            <a href="{{ route('tasks.index') }}" class="back-link">
                Back to Tasks
            </a>

        </form>

    </div>

</div>

</body>
</html>