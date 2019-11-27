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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/** Rotas para o autor */
Route::group(['prefix' => 'authors'], function () {
	Route::get('/', 'AuthorController@index');
	Route::match(['get', 'post'],'/create', 'AuthorController@create');
	Route::match(['get', 'post'],'/update/{id}', 'AuthorController@update');
	Route::get('/profile/{id}', 'AuthorController@show');
});

Route::group(['prefix' => 'books'], function(){
	Route::get('/', 'BookController@index');
	Route::match(['get', 'post'],'/create', 'BookController@create');
	Route::match(['get', 'post'],'/update/{id}', 'BookController@update');
	Route::get('/abstract/{id}', 'BookController@show');

});

Route::group(['prefix' => 'categories'], function(){
	Route::get('/', 'CategoryController@index');
	Route::match(['get', 'post'],'/create', 'CategoryController@create');
	Route::match(['get', 'post'],'/update/{id}', 'CategoryController@update');
});

Route::get('/clients', 'ClientController@index');
Route::get('/borrows', 'BorrowController@index');
