<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

Route::get('/counter', Counter::class);

Route::get('/user', function () {
    return view('user');
});

Route::get('/', function () {
    return view('welcome');
});
