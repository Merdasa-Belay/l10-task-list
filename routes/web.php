<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

// Route::get('/', function () {
//     return view('welcome');
// });






Route::get('/', function () {
    return redirect()->route('tasks.index');
});

// index
Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

// create
Route::view('/tasks/create', 'create')->name('tasks.create');
// edit
Route::get('/tasks/{task}/edit', function (Task $task) {

    return view('edit', ['task' =>  $task]);
})->name('tasks.edit');

// show
Route::get('/tasks/{task}', function (Task $task) {

    return view('show', ['task' =>  $task]);
})->name('tasks.show');

// create end point
Route::post('/tasks', function (TaskRequest $request) {
    // dd(request()->all());

    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated succesfully');
})->name('tasks.store');


// edit end point


Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // dd(request()->all());
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated succesfully');
})->name('tasks.update');


// delete end point

Route::delete('tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
})->name('tasks.destroy');


Route::put('tasks/{id}/toggle-complete', function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task updated successfully');
})->name('tasks.toggle-complete');
