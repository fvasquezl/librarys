<?php

//Route::get('/', function () {
//    return view('welcome');
//});
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('books/show/{book}-{slug}',[
   'uses'=> 'ShowBookController',
   'as' => 'books.show'
]);
Route::get('books-pendientes/{category?}', [
    'uses' => 'ListBookController',
    'as' => 'books.pending'
]);
Route::get('books-completados/{category?}', [
    'uses' => 'ListBookController',
    'as' => 'books.completed'
]);

Route::get('{category?}', [
    'uses' => 'ListBookController',
    'as' => 'books.index'
]);