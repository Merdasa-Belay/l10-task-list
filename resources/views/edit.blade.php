@extends('layouts.app')

@section('title', 'Edit Task')
@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.8rem;
        }
    </style>

@endsection

@section('content')

    {{-- {{ $errors }} --}}

    <form method="POST" action="{{ route('tasks.update', ['id' => $task->id]) }}">

        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            {{-- error message --}}



        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5">
                {{ $task->description }}
            </textarea>

        </div>

        <div>
            <label for="long_description">Long Description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
        </div>
        <button type="submit">Edit Task</button>
    </form>
@endsection
