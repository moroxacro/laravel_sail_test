<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\UserCancelController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\DictionaryRecursiveController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AjaxPostLikesProcessController;

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

// Ckeditor
Route::get('ckeditor', [CkeditorController::class, 'index']);
Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

// laravel-filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// UserEditController
Route::get('/edit', [UserEditController::class, 'index'])
->name('edit');
Route::post('edit', [UserEditController::class, 'edit']);

// UserCancelController
Route::get('/cancel', [UserCancelController::class, 'index'])
->name('cancel');
Route::post('cancel', [UserCancelController::class, 'cancel']);

// ContactFormController
Route::get('/mail', [ContactFormController::class, 'index'])
->name('mail');
Route::post('/mail', [ContactFormController::class, 'send']);

// DictionaryController
Route::get('/dictionary/{id1?}/{id2?}/{id3?}', [DictionaryController::class, 'index'])
->name('dictionary');
Route::post('/dictionary', [DictionaryController::class, 'store']);

// DictionaryRecursiveController
Route::get('/dictionary2/{id1?}/{id2?}', [DictionaryRecursiveController::class, 'index'])
->name('dictionary2');
Route::post('/dictionary2', [DictionaryRecursiveController::class, 'store']);

// PostController
Route::get('/post', [PostController::class, 'index'])
->name('post');
Route::post('/post', [PostController::class, 'store']);
Route::get('/{user?}/{id?}', [PostController::class, 'detail'])
->name('detail');

// CommentController
Route::post('/comment', [CommentController::class, 'store']);

// AjaxPostLikesProcessController
Route::post('/ajax_post', [AjaxPostLikesProcessController::class, 'store']);






