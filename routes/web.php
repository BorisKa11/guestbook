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

Route::get('/', 'MainController@index')->name('index');

Route::get('logout', 'UserController@logout')->name('logout');
Route::post('enter', 'UserController@enter');
Route::post('register', 'UserController@register');

Route::post('answer', 'GuestbookController@answer');
Route::post('update', 'GuestbookController@update');
Route::get('edit/{id}', 'GuestbookController@edit');
