<?php

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
        'tasks' => Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');

// create
Route::view('/tasks/create', 'create')->name('tasks.create');
// edit
Route::get('/tasks/{id}/edit', function ($id) {

    return view('edit', ['task' =>  Task::findOrFail($id)]);
})->name('tasks.edit');

// show
Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' =>  Task::findOrFail($id)]);
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
    // dd(request()->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'

    ]);
    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task updated succesfully');
})->name('tasks.store');


// edit end point


Route::put('/tasks/{id}', function ($id, Request $request) {
    // dd(request()->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'

    ]);
    $task = Task::findOrFail('$id');
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show', ['id' => $task->id])->with('success', 'Task updated succesfully');
})->name('tasks.update');
