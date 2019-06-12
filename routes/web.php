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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/create', [
    'uses'=>'BooksController@create',
    'as'=>'books.create'
]);

Route::get('mybooks', function () {
    return view('mybooks');
});

Route::get('/mybooks', [
    'uses' =>'BooksController@show',
    'as'=>'books.show'
]);

Route::post('/update/book/{id}', [
    'uses'=>'BooksController@update',
    'as'=>'books.update'
]);

Route::get('/edit/book/{id}','BooksController@edit');
Route::post('/edit/book/{id}','BooksCOntroller@update');

Route::delete('/destroy/book/{id}','BooksController@destroy');
