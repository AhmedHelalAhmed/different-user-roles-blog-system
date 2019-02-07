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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PostsController@index')->name('home');


Route::get('posts', 'PostsController@index')->name('posts.index')->middleware('auth');
Route::get('/posts/{id}', 'PostsController@show')->name('posts.show')->middleware('auth');





Route::get('posts/create', 'PostsController@create')->name('photos.create')->middleware(['auth','PostUser']);
Route::post('posts', 'PostsController@store')->name('posts.store')->middleware(['auth','PostUser']);




Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit')->middleware(['auth','EditUser']);
Route::put('/posts/{id}', 'PostsController@update')->name('posts.update')->middleware(['auth','EditUser']);
