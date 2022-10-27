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

Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');

Route::get('/todos/create', [App\Http\Controllers\TodoController::class, 'create'])->name('todo.get.create');

Route::post('/todos/create', [App\Http\Controllers\TodoController::class, 'store'])->name('todo.create');

Route::get('/todos/change/{todo}', [App\Http\Controllers\TodoController::class, 'editTodo'])->name('todo.get.update');

Route::patch('/todos/change/{todo}',[App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');

Route::put('todos/completed/{todo}', [App\Http\Controllers\TodoController::class, 'completeTodo'])->name('todo.completed');

Route::delete('/todos/delete/{todo}', [App\Http\Controllers\TodoController::class, 'delete'])->name('todo.delete');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
