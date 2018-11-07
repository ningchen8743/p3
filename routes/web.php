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

Route::get('/', 'WelcomeController');
Route::get('/count-word', 'WordController@initializeView');
Route::get('/count-word-calculate', 'WordController@countWord');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::get('/404', ['as' => '404', 'uses' => 'ErrorHandlerController@abort']);

