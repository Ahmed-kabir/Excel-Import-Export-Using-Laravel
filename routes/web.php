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
Route::get('/add_excel', 'ModelnameController@add_excel');
Route::post('/save_excel', 'ModelnameController@save_excel');
Route::get('/basic_email', 'ModelnameController@basic_email');
Route::get('/attachment_email', 'ModelnameController@attachment_email');
Route::get('/excel', 'ModelnameController@excel');
