<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('index');
});


Route::get('index', function () {
    return view('index');
})->name('Home');


Route::get('/about', function () {
    return view('about' ,
    ['name'=> 'Farid Ahmad Haidary']);
    })->name("about");


Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');


Route::get('contact/{Number}', function ($number) {
    return "This is contact page and this is my number: $number";
})->name('contact');


Route::fallback(function () {
    return "This page is not complated right now!";
});
