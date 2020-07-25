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
Route::group(['prefix' => 'admin'], function() {
    Route::get('todo/create', 'Admin\TodoController@add');
    Route::post('todo/create', 'Admin\TodoController@create'); 
    Route::get('todo', 'Admin\TodoController@index');
    Route::get('todo/edit', 'Admin\TodoController@edit');
    Route::post('todo/edit', 'Admin\TodoController@update');
    Route::get('todo/delete', 'Admin\TodoController@delete');
    Route::get('/', 'TodoController@index');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
