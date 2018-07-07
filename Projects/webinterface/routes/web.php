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
Route::get('/customer', 'HomeController@index')->name('customer');
//HR
Route::get('/hr', 'HrController@index')->name('home');
Route::post('/hr.detaildokter', 'HrController@show')->name('detaildokter');
Route::post('/hr.deletedokter', 'HrController@destroy')->name('deletedokter');
//Unit Medis
Route::get('/medicalunit', 'MedicalunitController@index')->name('medicalunit');
Route::get('/medicalunit.unitbaru', 'MedicalunitController@unitbaruindex')->name('unitbaru');
Route::post('/medicalunit.unitbaru.unitbaruadd', 'MedicalunitController@create')->name('unitbaruadd');
//Rawat Jalan
Route::get('/rawatjalan', 'RawatjalanController@index')->name('rawatjalan');
Route::post('/rawatjalan.hapusantrian', 'RawatjalanController@destroy')->name('hapusantrian');