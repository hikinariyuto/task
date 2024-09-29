<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\GroupController;

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

Route::get('/', [TaskController::class, 'task']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/update', [TaskController::class, 'update']);
Route::delete('/tasks/delete', [TaskController::class, 'destroy']);

Route::get('/groups', [GroupController::class, 'devide']);
Route::post('/groups', [GroupController::class, 'store']);
Route::patch('/groups/update', [GroupController::class, 'update']);
Route::delete('/groups/delete', [GroupController::class, 'destroy']);

Route::get('/tasks/search', [TaskController::class, 'search']);