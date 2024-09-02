<h1>
    List of Tasks
</h1>


<div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <a href="{{ route('tasks.show', ['id' => $task->id]) }}"> {{ $task->title }} <br></a>
    @empty
        <div>There are tasks!</div>
    @endforelse

    <div>
        There are no Tasks!
    </div>
    {{-- @endif --}}
</div>
