<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserEditController;

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

// auth.phpにあるルートを参照する
require __DIR__.'/auth.php';

// WelcomeController
Route::get('/', [WelcomeController::class, 'index'])
->name('index');
Route::get('/category/{id?}', [WelcomeController::class, 'getCategory'])
->name('category');

// UserEditController
Route::get('/edit', [UserEditController::class, 'index'])
->name('edit');

Route::post('edit', [UserEditController::class, 'edit']);

// ContactFormController
Route::get('/mail', [ContactFormController::class, 'index'])
->name('mail');
Route::post('/mail', [ContactFormController::class, 'send']);

// PostController
Route::get('/post', [PostController::class, 'index'])
->name('post');
Route::post('/post', [PostController::class, 'store']);
Route::get('/{user?}/{id?}', [PostController::class, 'detail'])
->name('detail');

// UploadController
Route::post('/upload', [UploadController::class, 'store']);





