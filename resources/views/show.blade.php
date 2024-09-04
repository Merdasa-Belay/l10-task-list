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
