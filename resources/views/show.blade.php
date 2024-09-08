@extends('layouts.app')

@section('title', 'The list of tasks')
@section('content')



    <p>
        {{ $task->description }}
    </p>


    <p>
        {{ $task->long_description }}
    </p>
    <p>
        {{ $task->created_at }}
    </p>
    <p>
        {{ $task->updated_at }}

    </p>
    <p>
        @if ($task->completed)
            completed
        @else
            Not completed
        @endif
    </p>
    <div>
        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">

            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>
    </div>
    <div>
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">edit</a>
    </div>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    </div>
@endsection
