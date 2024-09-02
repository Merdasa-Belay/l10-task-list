<?php

use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

// Route::get('/', function () {
//     return view('welcome');
// });





Route::get('/', function () {
    return redirect()->route('tasks.index');
});


Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->where('completed', true)->get()
    ]);
})->name('tasks.index');


Route::get('/tasks/{id}', function ($id) {

    return view('show', ['task' =>  \App\Models\Task::findOrFail($id)]);
})->name('tasks.show');
