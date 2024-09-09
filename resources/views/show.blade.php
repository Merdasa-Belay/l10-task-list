@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')

    <div class="container-fluid d-grid align-items-center justify-content-center">
        <div class="mb-4">
            <a href="{{ route('tasks.index') }}" class="font-weight-bold text-gray-700 text-decoration-underline text-danger">
                <i class="fa fa-arrow-circle-left"></i> Go back to the task list!
            </a>
        </div>

        <p class="mb-4 text-gray-700">
            {{ $task->description }}
        </p>

        @if ($task->long_description)
            <p class="mb-4 text-gray-700">
                {{ $task->long_description }}
            </p>
        @endif

        <p class="mb-4 text-sm text-muted">Created
            {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }}
        </p>

        <p class="mb-4">
            @if ($task->completed)
                <span class="mb-4" style="color: green;font-size: medium;font-weight: 500">Completed</span>
            @else
                <span class="mb-4" style="color: red;font-size: medium;font-weight: 500">Not completed</span>
            @endif
        </p>

        <div class="d-flex gap-2">
            <div>
                <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-primary">
                        Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                    </button>
                </form>
            </div>

            <div>
                <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-warning">Edit</a>
            </div>

            <div>
                <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection
