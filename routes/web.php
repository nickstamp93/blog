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

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])
    ->where('slug', '[\w\d\-\_]+');

Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);

Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'contact']);

Route::get('about', ['uses' => 'PagesController@getAbout', 'as' => 'about']);

Route::get('/', 'PagesController@getIndex');

Route::resource('posts', 'PostController');

// we won't use a separate create view, so no route should be listed
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentsController@edit']);
Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentsController@update']);
Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);

// we won't use a separate create view, so no route should be listed
Route::resource('tags', 'TagController', ['except' => ['create']]);

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
