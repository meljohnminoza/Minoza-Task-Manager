<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
</head>
<body>

    <h1>My Task Manager</h1>

    <a href="{{ route('tasks.create') }}">Add New Task</a>

    <hr>

    @if ($tasks->count() > 0)

        @foreach ($tasks as $task)

            <h3>{{ $task->task_name }}</h3>

            <p>{{ $task->description }}</p>

            <p>Status: {{ $task->status }}</p>

            <p>Due Date: {{ $task->due_date }}</p>

            <br>

            <a href="{{ route('tasks.edit', $task) }}">Edit</a>

            <form action="{{ route('tasks.complete', $task) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')

                @if ($task->status == 'Pending')
                    <button type="submit">Mark Completed</button>
                @else
                    <button type="submit">Mark Pending</button>
                @endif
            </form>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

            <hr>

        @endforeach

    @else

        <p>No tasks yet.</p>

    @endif

</body>
</html>