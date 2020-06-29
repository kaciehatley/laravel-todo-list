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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/','TasksController@index');
Route::post('/create','TasksController@create');
Route::patch('update', 'TasksController@update')->name('update');
Route::patch('markComplete', 'TasksController@markComplete')->name('markComplete');
Route::patch('markIncomplete', 'TasksController@markIncomplete')->name('markIncomplete');

Route::delete('/delete','TasksController@delete');

Route::get('logout', 'Auth\LoginController@logout');