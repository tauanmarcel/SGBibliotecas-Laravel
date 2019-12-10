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

Route::get('/', 'BorrowController@index')->name('home');

/** Rotas para o autor */
Route::group(['prefix' => 'authors'], function () {
	Route::get('/', 'AuthorController@index');
	Route::match(['get', 'post'],'/create', 'AuthorController@create');
	Route::match(['get', 'post'],'/update/{id}', 'AuthorController@update');
	Route::get('/profile/{id}', 'AuthorController@show');
});

/** Rotas para livros */
Route::group(['prefix' => 'books'], function(){
	Route::get('/', 'BookController@index');
	Route::match(['get', 'post'],'/create', 'BookController@create');
	Route::match(['get', 'post'],'/update/{id}', 'BookController@update');
	Route::get('/abstract/{id}', 'BookController@show');

});

/** Rotas para categorias */
Route::group(['prefix' => 'categories'], function(){
	Route::get('/', 'CategoryController@index');
	Route::match(['get', 'post'],'/create', 'CategoryController@create');
	Route::match(['get', 'post'],'/update/{id}', 'CategoryController@update');
});

/** Rotas para clientes */
Route::group(['prefix' => 'clients'], function(){
	Route::get('/', 'ClientController@index');
	Route::match(['get', 'post'],'/create', 'ClientController@create');
	Route::match(['get', 'post'],'/update/{id}', 'ClientController@update');
	Route::get('/profile/{id}', 'ClientController@show');
});

/** Rotas para empréstimos */
Route::group(['prefix' => 'borrows'], function(){
	Route::get('/', 'BorrowController@index');
	Route::match(['get', 'post'],'/create', 'BorrowController@create');
	Route::match(['get', 'post'],'/update/{id}', 'BorrowController@update');
	Route::get('/profile/{id}', 'BorrowController@show');
});
