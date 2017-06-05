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


Route::get('/links', 'LinkController@viewLinks')->name('linkLinks');

Route::post('/create', 'LinkController@create');

Route::get('/r/{link_token}', 'VisitorController@redirect')->name('linkRedirect');




Route::get('/', 'StatisticController@index')->name('main');

Route::get('/statistics/{id?}', 'StatisticController@viewStat')->name('linkStatistics');

 
Route::get('/users{id?}', 'VisitorController@viewUsers')->name('linkUsers');


Route::get('/user/{id?}', 'VisitorController@viewUserStat')->name('linkUserStat');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
