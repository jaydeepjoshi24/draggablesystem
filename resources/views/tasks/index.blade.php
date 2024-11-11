@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Task List</h1>
    <button><a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a></button>

    <div class="row">
        <!-- High Priority Section -->
        <div class="col-lg-4 mb-4">
            <h3 class="text-center">High Priority</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($highPriorityTasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ Str::limit($task->task_description, 50) }}</td>
                                <td>
                                    <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning' }}">
                                        {{ $task->completed ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                                <td>
                                    <button> <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a> </button>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Medium Priority Section -->
        <div class="col-lg-4 mb-4">
            <h3 class="text-center">Medium Priority</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mediumPriorityTasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ Str::limit($task->task_description, 50) }}</td>
                                <td>
                                    <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning' }}">
                                        {{ $task->completed ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                                <td>
                                    <button><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a></button>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Low Priority Section -->
        <div class="col-lg-4 mb-4">
            <h3 class="text-center">Low Priority</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Task Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowPriorityTasks as $task)
                            <tr>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ Str::limit($task->task_description, 50) }}</td>
                                <td>
                                    <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning' }}">
                                        {{ $task->completed ? 'Completed' : 'Pending' }}
                                    </span>
                                </td>
                                <td>
                                   <button> <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a></button>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection
