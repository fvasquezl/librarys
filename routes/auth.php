<?php
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('books/create',[
    'uses' => 'CreateBookController@create',
    'as' => 'books.create'
]);

Route::put('books/store',[
    'uses' => 'CreateBookController@store',
    'as' => 'books.store'
]);
Route::delete('books/delete/{book}',[
    'uses' => 'DeleteBookController@delete',
    'as' => 'books.delete'
]);
Route::get('mis-books/{category?}', [
    'uses' => 'ListBookController',
    'as' => 'books.mine',
]);