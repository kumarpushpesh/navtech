<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('destroy/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('destroy');
Route::get('edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::get('add', [App\Http\Controllers\HomeController::class, 'add_view'])->name('add');
Route::post('add', [App\Http\Controllers\HomeController::class, 'add']);
Route::post('update/{id}', [App\Http\Controllers\HomeController::class, 'update']);

Route::get('datatable', [OrderController::class, 'index']);
Route::post('add-update-order', [OrderController::class, 'store']);
Route::post('edit-order', [OrderController::class, 'edit']);
Route::post('delete-order', [OrderController::class, 'destroy']);


