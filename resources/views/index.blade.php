<h1>
    List of Tasks
</h1>


<div>
    @if (count($tasks))
        @foreach ($tasks as $task)
            <div>
                {{ $task->title }}
            </div>
        @endforeach
        <div>There are tasks!</div>
    @else
        <div>
            There are no Tasks!
        </div>
    @endif
</div>
