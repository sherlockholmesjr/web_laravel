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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/test', function(){
	return view('test');
});

Route::get('/index', 'HomeController@index');
Route::get('/createData', 'HomeController@make');
Route::post('/storeData', 'HomeController@store');
Route::get('/live_search', 'HomeController@liveSearch');
Route::get('/live_search/action', 'HomeController@action')->name('live_search.action');
Route::get('/edit/{data}', 'HomeController@edit');
Route::post('/edit/update/{data}', 'HomeController@update');
Route::get('/delete/{data}', 'HomeController@delete');
Route::get('/', 'HomeController@login');
Route::post('/checklogin', 'HomeController@checklogin');
Route::get('/createUserForm', 'HomeController@createUserForm');
Route::post('/createUser', 'HomeController@registration');
Route::get('/logout', 'HomeController@logout');
