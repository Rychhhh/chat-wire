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
require __DIR__.'/auth.php';

Route::get('/', function() {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::get('/livewire', function () {
    return view('Tampilan.index');
})->middleware(['auth'])->name('livewire');

Route::get('pesan', function() {
    return view('Tampilan.chat');
})->middleware(['auth'])->name('pesan');

