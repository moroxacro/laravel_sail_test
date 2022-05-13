<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UploadController;

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

Route::get('/', [WelcomeController::class, 'index'])
->name('index');

Route::get('/mail', [ContactFormController::class, 'index'])
->name('mail');
Route::post('/mail', [ContactFormController::class, 'send']);

Route::get('/post', [PostController::class, 'index'])
->name('post');
Route::post('/post', [PostController::class, 'store']);

Route::post('/upload', [UploadController::class, 'store']);

Route::get('/{user?}/{id?}', [PostController::class, 'detail'])
->name('detail');

