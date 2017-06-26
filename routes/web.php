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



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/table', 'HomeController@table');
/*************************data table*******************************/
Route::get('/get_user_table', 'HomeController@get_user_table');
Route::get('/get_it_table', 'ItController@get_data_it');
Route::get('/get_hr_table', 'HrController@get_data_hr');
/*************************data table*******************************/
Route::resource('it', 'ItController');
Route::resource('hr', 'HrController');


Route::get('/log','LogController@index');
Route::get('/delete_user/{id}','HomeController@delete');
Route::get('edit_user/{id}','HomeController@edit');
Route::post('edit_user/{id}','HomeController@save_edit');



/*Route::post('edit_user/{id}','HomeController@save_edit');*/
/*Route::post('save_edit/','HomeController@save_edit');*/