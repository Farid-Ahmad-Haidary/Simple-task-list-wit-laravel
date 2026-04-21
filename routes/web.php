<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect('/tasks');
});

// ============================================================================
// روت شماره ۲: نمایش همه تسک‌ها (INDEX)
// ============================================================================

Route::get('/tasks', function () {
    return view('index', ['tasks' => Task::latest()->get()]);
})->name('tasks.index');



Route::view('/tasks/create', 'create')->name('tasks.create');

// ============================================================================
// روت شماره ۴: نمایش فرم ویرایش تسک (EDIT)
// ============================================================================

Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit', ['task' => Task::findOrFail($id)]);
})->name('tasks.edit');

// ============================================================================
// روت شماره ۵: نمایش جزئیات یک تسک (SHOW)
// ============================================================================

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');

// ============================================================================
// روت شماره ۶: ذخیره تسک جدید در دیتابیس (STORE)
// ============================================================================

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    // ایجاد شیء جدید در حافظه (هنوز در دیتابیس نیست)
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    
    // ذخیره در دیتابیس (حالا یک ID دریافت می‌کند)
    $task->save();

    // هدایت به صفحه نمایش همان تسک
    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.store');

// ============================================================================
// روت شماره ۷: بروزرسانی تسک موجود در دیتابیس (UPDATE)
// ============================================================================

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    // پیدا کردن تسک موجود (اگر نبود خطا می‌دهد)
    $task = Task::findOrFail($id);
    
    // جایگزینی Data قدیمی با داده‌های جدید
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    
    // ذخیره در دیتابیس (آپدیت)
    $task->save();

    // هدایت به صفحه نمایش همان تسک
    return redirect()->route('tasks.show', ['id' => $task->id]);
})->name('tasks.update');

// ============================================================================
// روت شماره ۸: روت خطا (FALLBACK) 
// ============================================================================

Route::fallback(function () {
    return "This page is not completed right now!";
});
