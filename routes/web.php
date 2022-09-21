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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('Donor/auth/login', function () {
    return view('Donor/auth/login');
});

Route::get('Donor/auth/t&c', function () {
    return view('Donor/auth/t&c');
});

Route::post('Donor/auth/t&c', function () {
    return view('Donor/auth/t&c');
});
