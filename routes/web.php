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
Route::get('/table', 'HomeController@table');
Route::get('/it', 'ItController@index');
Route::get('/log','LogController@index');
Route::get('/delete_user/{id}','HomeController@delete');
Route::get('edit_user/{id}','HomeController@edit');
Route::post('edit_user/{id}','HomeController@save_edit');

/*Route::post('edit_user/{id}','HomeController@save_edit');*/
/*Route::post('save_edit/','HomeController@save_edit');*/