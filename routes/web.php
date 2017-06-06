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

Route::get('/r/{link_token}', 'RedirectController@redirect')->name('linkRedirect');


Route::get('/links', 'LinkController@viewLinks')->name('linkLinks');

Route::post('/create', 'LinkController@create');


Route::get('/', 'StatisticController@index')->name('main');

Route::get('/statistics/{id?}', 'StatisticController@viewStat')->name('linkStatistics');

 
Route::get('/users{id?}', 'VisitorController@viewUsers')->name('linkUsers');


Route::get('/user/{id?}', 'VisitorController@viewUserStat')->name('linkUserStat');



	//Auth::routes();
	//Route::get('/home', 'HomeController@index')->name('home');
    // Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

/*Route::get('/logout', function () { 
	Auth::logout(); 
	return redirect()->route('main');
	})->name('logout');*/

