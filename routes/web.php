<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/tasks');
});


Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::latest()->get()]);
})->name('tasks.index');



Route::view('/tasks/create', 'create')->name('tasks.create');

// ============================================================================
// روت شماره ۴: نمایش فرم ویرایش تسک (EDIT)
// ============================================================================

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task'=> $task]);
})->name('tasks.edit');

// ============================================================================
// روت شماره ۵: نمایش جزئیات یک تسک (SHOW)
// ============================================================================

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

// ============================================================================
// روت شماره ۶: ذخیره تسک جدید در دیتابیس (STORE)
// ============================================================================

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id]);
})->name('tasks.store');

// ============================================================================
// روت شماره ۷: بروزرسانی تسک موجود در دیتابیس (UPDATE)
// ============================================================================

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
   $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id]);
})->name('tasks.update');


Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'تسک حذف شد!');
})->name('task.destroy');
// ============================================================================
// روت شماره ۸: روت خطا (FALLBACK) 
// ============================================================================

Route::fallback(function () {
    return "This page is not completed right now!";
});
