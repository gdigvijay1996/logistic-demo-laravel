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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/users', 'UsersController@index')->name('users');

Route::get('/home/users-list', 'UsersController@usersList');
Route::get('/home/users-list/{user}', 'UsersController@getUser');
Route::post('/home/users-list/edit/{user}', 'UsersController@update');
Route::get('/home/users-list/delete/{user}', 'UsersController@removeUser');
