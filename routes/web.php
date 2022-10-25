<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('auth.d_home');
})->middleware(['auth'])->name('d_home');

require __DIR__.'/auth.php';

Route::get('auth/t&c', function () {
    return view('auth/t&c');
});

Route::post('auth/t&c', function () {
    return view('auth/t&c');
});


Route::get('/gaboutUs', function () {
    return view('aboutUs');
})->name('gaboutUs');

