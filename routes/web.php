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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/admin_dashboard', function () {
    return view('auth.admin_dashboard');
})->middleware(['auth'])->name('admin_dashboard');


Route::get('/hospitals_list', function () {
    return view('auth.hospitals_list');
})->middleware(['auth'])->name('hospitals_list');

require __DIR__.'/auth.php';

Route::get('Donor/auth/login', function () {
    return view('Donor/auth/login');
});

Route::get('auth/t&c', function () {
    return view('auth/t&c');
});

Route::post('auth/t&c', function () {
    return view('auth/t&c');
});
