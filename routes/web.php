<?php

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

Route::get('/', function () {
    return view('index');
});

Route::get('customers', function () {
    return response()->json(\App\Models\Customer::query()->select(['id', 'name'])->get());
});

Route::get('login', 'App\Http\Controllers\LoginController@index');
Route::post('login', 'App\Http\Controllers\LoginController@post');

Route::get('admin', 'App\Http\Controllers\AdminController@index');
Route::post('admin', 'App\Http\Controllers\AdminController@create');
Route::get('complete', 'App\Http\Controllers\AdminController@complete');


// Route::post('customers', function () {});
// Route::get('customers/{customer_id}', function () {});
// Route::put('customers/{customer_id}', function () {});
// Route::delete('customers/{customer_id}', function () {});
// Route::get('reports', function () {});
// Route::post('reports', function () {});
// Route::get('reports/{customer_id}', function () {});
// Route::put('reports/{customer_id}', function () {});
// Route::delete('reports/{customer_id}', function () {});

