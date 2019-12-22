<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('posts')->group(function (){
    Route::get('index','PostController@index')->name('posts.index');
    Route::get('{id}/show','PostController@show')->name('posts.show');
    Route::get('create','PostController@create')->name('posts.create');
    Route::post('store','PostController@store')->name('posts.store');
});

Route::prefix('comments')->group(function (){
    Route::post('store','CommentController@store')->name('comments.store');
});

