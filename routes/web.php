<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\Users;
use App\Livewire\Home;
use App\Livewire\About;

Route::get('/counter', Counter::class);

Route::get('/user', Users::class)->name('users');

Route::get('/home', Home::class)->name('home');

Route::get('/about', About::class)->name('about');

Route::get('/', function () {
    return view('welcome');
});
