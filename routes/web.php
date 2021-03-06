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


Auth::routes(['register' => false]);

Route::get('/', 'ShowController@IndexShow');

Route::get('/admin', 'PropertyController@AdminPanel');
Route::get('/admin/detial/{page?}', 'PropertyController@PropretyList');
Route::get('/admin/export', 'PropertyController@ExportToExcel');
Route::post('/admin/{all}', 'PropertyController@PropertyCtrl')->where('all', '.*');
