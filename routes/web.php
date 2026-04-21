<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//? Redirects the root URL to the tasks index page
Route::get('/', function () {
  return redirect('/tasks');
});



//? Displays the index view with a list of all tasks, ordered by latest creation
Route::get('/tasks', function () {
    return view('index',
    ['tasks' => Task::latest()->get()]);
})->name('tasks.index');


//? Renders the create view for adding a new task
Route::view('/tasks/create' ,'create')->name('tasks.create');


//? Displays the show view for a specific task identified by its ID
Route::get('/tasks/{id}', function ($id ){
  return view('show', ['task'=> Task::findOrFail($id)]);
    })->name('tasks.show');


//? Handles the POST request to store a new task (currently dumps the request data for debugging)
Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show' , ['id'=> $task->id]);
})->name('tasks.store');


//? Provides a fallback response for any unmatched routes, indicating the page is not completed
Route::fallback(function () {
    return "This page is not complated right now!";
});
