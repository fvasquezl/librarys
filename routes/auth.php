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


Route::get('admin/users',[
    'uses' => 'UserController@index',
    'as' => 'users.index'
]);

Route::get('admin/users/{user}/edit',[
    'uses' => 'UserController@edit',
    'as' => 'users.edit'
]);

Route::put('admin/users/update/{user}',[
    'uses' => 'UserController@update',
    'as' => 'users.update'
]);

Route::get('admin/categories',[
    'uses' => 'CategoryController@index',
    'as' => 'categories.index'
]);


Route::get('admin/categories/create',[
    'uses' => 'CategoryController@create',
    'as' => 'categories.create'
]);

Route::put('admin/categories/store',[
    'uses' => 'CategoryController@store',
    'as' => 'categories.store'
]);

Route::get('admin/categories/{category}/edit',[
    'uses' => 'CategoryController@edit',
    'as' => 'categories.edit'
]);

Route::put('admin/categories/update/{category}',[
    'uses' => 'CategoryController@update',
    'as' => 'categories.update'
]);

