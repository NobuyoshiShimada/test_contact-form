<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', [ContactController::class, 'contact']);
Route::post('/contact/confirm', [ContactController::class, 'confirm']);
Route::get('/contact/confirm', function (){return redirect('/');});
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/admin', [AdminController::class, 'index']);
Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register']);
