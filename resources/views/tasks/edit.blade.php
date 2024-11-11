@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="task_name" class="form-label">Task Name</label>
            <input type="text" class="form-control" id="task_name" name="task_name" value="{{ $task->task_name }}" required>
        </div>

        <div class="mb-3">
            <label for="task_description" class="form-label">Description</label>
            <textarea class="form-control" id="task_description" name="task_description">{{ $task->task_description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="task_priority" class="form-label">Priority</label>
            <select class="form-select" id="task_priority" name="task_priority" required>
                <option value="Low" {{ $task->task_priority == 'Low' ? 'selected' : '' }}>Low</option>
                <option value="Medium" {{ $task->task_priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                <option value="High" {{ $task->task_priority == 'High' ? 'selected' : '' }}>High</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="task_image" class="form-label">Task Image</label>
            <input type="file" class="form-control" id="task_image" name="task_image">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="completed" name="completed" {{ $task->completed ? 'checked' : '' }}>
            <label class="form-check-label" for="completed">Completed</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Task</button>
    </form>
@endsection
