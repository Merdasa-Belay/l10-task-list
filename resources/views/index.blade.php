@extends('layouts.app')
@section('title', 'The list of tasks')
@section('content')


    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>

    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"> {{ $task->title }} <br></a>
    @empty
        <div>There are tasks!</div>
    @endforelse


    {{-- @endif --}}

    @if ($task->count())
        {{ $tasks->links() }}
    @endif

@endsection
