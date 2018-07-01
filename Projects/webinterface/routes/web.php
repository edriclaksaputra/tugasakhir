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
//Customer
Route::get('/', 'HomeController@index')->name('home');
Route::get('/customer', 'HomeController@index')->name('home');
//HR
Route::get('/hr', 'HrController@index')->name('home');
//Unit Medis
Route::get('/medicalunit', 'MedicalunitController@index')->name('home');
Route::get('/medicalunit.unitbaru', 'MedicalunitController@unitbaruindex')->name('home');
//Rawat Jalan
Route::get('/rawatjalan', 'RawatjalanController@index')->name('home');