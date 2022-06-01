<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostEditController;
use App\Http\Controllers\PostDeleteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserEditController;
use App\Http\Controllers\UserCancelController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\DictionaryRecursiveController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AjaxPostLikesProcessController;
use App\Http\Controllers\WordSearchController;


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

Route::get('/', [HomeController::class, 'index'])
            ->name('index');
Route::get('tags/{id?}', [HomeController::class, 'tag'])
            ->name('tags');

Route::get('ckeditor', [CkeditorController::class, 'index']);

Route::post('ckeditor/upload', [CkeditorController::class, 'upload'])->name('ckeditor.upload');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('edit', [UserEditController::class, 'index'])
            ->name('edit');

Route::post('edit', [UserEditController::class, 'edit']);

Route::get('cancel', [UserCancelController::class, 'index'])
            ->name('cancel');

Route::post('cancel', [UserCancelController::class, 'cancel']);

Route::get('mail', [ContactFormController::class, 'index'])
            ->name('mail');

Route::post('mail', [ContactFormController::class, 'send']);

Route::get('dictionary/{id1?}/{id2?}/{id3?}', [DictionaryController::class, 'index'])
            ->name('dictionary');

Route::post('dictionary', [DictionaryController::class, 'store']);

Route::get('dictionary2/{id1?}/{id2?}', [DictionaryRecursiveController::class, 'index'])
            ->name('dictionary2');

Route::post('dictionary2', [DictionaryRecursiveController::class, 'store']);

Route::get('post', [PostController::class, 'index'])
            ->name('post');

Route::post('post', [PostController::class, 'store']);

Route::get('post-edit', [PostEditController::class, 'index'])
            ->name('post.edit');

Route::post('post-update', [PostEditController::class, 'update'])
            ->name('post.update');

Route::post('post-update-done', [PostEditController::class, 'store'])
            ->name('post.update.done');

Route::post('post-delete', [PostDeleteController::class, 'delete'])
            ->name('post.delete');

Route::get('{user?}/{id?}', [PostController::class, 'detail'])
            ->name('detail');

Route::post('comment', [CommentController::class, 'store']);

Route::post('ajax_post', [AjaxPostLikesProcessController::class, 'store']);

Route::post('search', [WordSearchController::class, 'search'])
            ->name('search');






