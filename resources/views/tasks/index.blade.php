<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>My Task Manager</h1>
        <p>Manage your tasks easily and stay organized.</p>

        <br>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            + Add New Task
        </a>
    </div>

    @if ($tasks->count() > 0)

        @foreach ($tasks as $task)

            <div class="task-card">

                <h3>{{ $task->task_name }}</h3>

                <p>
                    {{ $task->description ?: 'No description provided.' }}
                </p>

                <p>
                    <strong>Due Date:</strong>
                    {{ $task->due_date ?: 'No due date' }}
                </p>

                @if ($task->status == 'Pending')
                    <span class="status status-pending">
                        Pending
                    </span>
                @else
                    <span class="status status-completed">
                        Completed
                    </span>
                @endif

                <div class="actions">

                    <a href="{{ route('tasks.edit', $task) }}"
                       class="btn btn-edit">
                        Edit
                    </a>

                    <form action="{{ route('tasks.complete', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        @if ($task->status == 'Pending')
                            <button type="submit" class="btn btn-success">
                                Mark Completed
                            </button>
                        @else
                            <button type="submit" class="btn btn-primary">
                                Mark Pending
                            </button>
                        @endif

                    </form>

                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

    @else

        <div class="task-card empty">
            <h3>No tasks yet.</h3>
            <p>Click "Add New Task" to create your first task.</p>
        </div>

    @endif

</div>

</body>
</html>