<?php
use Illuminate\Support\Facades\Route;

class Task
{
  public function __construct(
    public int $id,
    public string $title,
    public string $description,
    public ?string $long_description,
    public bool $completed,
    public string $created_at,
    public string $updated_at
  ) {
  }
}

$tasks = [
  new Task(
    1,
    'Buy groceries',
    'Task 1 description',
    'Task 1 long description',
    false,
    '2023-03-01 12:00:00',
    '2023-03-01 12:00:00'
  ),
  new Task(
    2,
    'Sell old stuff',
    'Task 2 description',
    null,
    false,
    '2023-03-02 12:00:00',
    '2023-03-02 12:00:00'
  ),
  new Task(
    3,
    'Learn programming',
    'Task 3 description',
    'Task 3 long description',
    true,
    '2023-03-03 12:00:00',
    '2023-03-03 12:00:00'
  ),
  new Task(
    4,
    'Take dogs for a walk',
    'Task 4 description',
    null,
    false,
    '2023-03-04 12:00:00',
    '2023-03-04 12:00:00'
  ),
   new Task(
    5,
    'Read a book',
    'Task 5 description',
    'Task 5 long description',
    true,
    '2026-03-05 12:00:00',
    '2026-03-05 12:00:00'
  ),
  new Task(
    6,
    'Go to the gym',
    'Task 6 description',
    null,
    false,
    '2023-03-06 12:00:00',
    '2023-03-06 12:00:00'
  )
];


Route::get('/', function () use ($tasks) {
    return view('index',
    ['tasks' => $tasks]);
})->name('tasks.index');



// 
Route::get('/{id}', function ($id) {
    return "One task with id: $id";
})->name('tasks.show');







// Route::get('/about', function () {
//     return view('about' ,
//     ['name'=> 'Farid Ahmad Haidary']);
//     })->name("about");


// Route::get('/blogs', function () {
//     return view('blogs');
// })->name('blogs');


// Route::get('contact/{Number}', function ($number) {
//     return "This is contact page and this is my number: $number";
// })->name('contact');


Route::fallback(function () {
    return "This page is not complated right now!";
});
