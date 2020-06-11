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

Route::get('/', 'PostController@index')->name('index');

Route::get('post-detail/{id}', 'PostController@detail')->name('post.detail');

Route::post('signin', 'AuthController@signin')->name('signin');

Route::post('signup', 'AuthController@signup')->name('signup');

Route::get('logout', 'AuthController@logout')->name('logout');

Route::group(['prefix' => 'post', 'middleware' => 'createPost'], function(){

    Route::post('create', 'PostController@create')->name('post.create');

    Route::post('update/{id}', 'PostController@update')->name('post.update');

    Route::get('delete/{id}', 'PostController@delete')->name('post.delete');

});

Route::group(['prefix' => 'post', 'middleware' => 'createPost'], function(){

    Route::post('create', 'PostController@create')->name('post.create');

    Route::post('update/{id}', 'PostController@update')->name('post.update');

    Route::get('delete/{id}', 'PostController@delete')->name('post.delete');

});

Route::group(['prefix' => 'comment', 'middleware' => 'auth'], function(){

    Route::post('create', 'CommentController@create')->name('comment.create');

    Route::post('update', 'CommentController@update')->name('comment.update');

    Route::post('delete', 'CommentController@destroy')->name('comment.delete');

});


