<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;

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

// Route::get('/user', [UserController::class, 'index']);
// OR
Route::get('/user', 'App\Http\Controllers\UserController@index');

Route::post('/upload', [App\Http\Controllers\UserController::class, 'uploadImage']);

Route::get('/todo', [App\Http\Controllers\TodoController::class, 'show'])->name('todo.index');

Route::get('/todo/create', [App\Http\Controllers\TodoController::class, 'create'])->name('todo.show.create');

Route::post('/todo/create', [App\Http\Controllers\TodoController::class, 'store'])->name('todo.create');

Route::get('/todo/change/{todo}', [App\Http\Controllers\TodoController::class, 'editTodo'])->name('todo.show.update');

Route::patch('/todo/change/{todo}',[App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');

Route::put('todo/completed/{todo}', [App\Http\Controllers\TodoController::class, 'completeTodo'])->name('todo.completed');

Route::delete('/todo/delete/{todo}', [App\Http\Controllers\TodoController::class, 'destroy'])->name('todo.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
