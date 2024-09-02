@extends('layouts.app')

@section('content')

@section('title', $task->title)


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
@endsection
