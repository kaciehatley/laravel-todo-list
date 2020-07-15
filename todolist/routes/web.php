<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

// HTTP Routes For Auth User
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/','TasksController@index')->middleware('auth');

// API ROUTES

// Create
Route::post('create','TasksController@create');
// Update
Route::patch('update', 'TasksController@update')->name('update');
Route::patch('markComplete', 'TasksController@markComplete')->name('markComplete');
Route::patch('markIncomplete', 'TasksController@markIncomplete')->name('markIncomplete');
Route::patch('checkToComplete', 'TasksController@checkToComplete')->name('checkToComplete');

// Delete
Route::delete('delete','TasksController@delete');

Route::get('logout', 'Auth\LoginController@logout');