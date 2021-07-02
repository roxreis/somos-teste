<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
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

Route::get('/', [TaskController::class, 'listTasks'])->name('listTasks');
Route::get('/create-task', [TaskController::class, 'createTask'])->name('createTask');
Route::post('/save-task', [TaskController::class, 'saveTask'])->name('saveTask');
Route::get('/detail-task/{id}', [TaskController::class, 'detailTask'])->name('detailTask');


Route::post('/save-category', [CategoryController::class, 'saveCategory'])->name('saveCategory');
