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

Auth::routes();

Route::get('/home', [App\Http\Controllers\ReminderController::class, 'index'])->name('home');
Route::get('/create', [App\Http\Controllers\ReminderController::class, 'create'])->name('create');
Route::post('store', [App\Http\Controllers\ReminderController::class, 'store'])->name('store');
Route::get('edit/{id?}', [App\Http\Controllers\ReminderController::class, 'edit'])->name('edit');
Route::post('update', [App\Http\Controllers\ReminderController::class, 'update'])->name('update');
Route::delete('delete/{id?}', [App\Http\Controllers\ReminderController::class, 'destroy'])->name('delete');
