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
Route::get('/customer', 'CustomerController@index')->name('customer');
//HR
Route::get('/hr', 'HrController@index')->name('home');
Route::post('/hr.detaildokter', 'HrController@show')->name('detaildokter');
Route::post('/hr.detaildokter.ubah', 'HrController@edit')->name('detaildokter');
Route::post('/hr.deletedokter', 'HrController@destroy')->name('deletedokter');
//Unit Medis
Route::get('/medicalunit', 'MedicalunitController@index')->name('medicalunit');
Route::post('/medicalunit.hapusunitmedis', 'MedicalunitController@destroy')->name('hapusunitmedis');
Route::get('/medicalunit.unitbaru', 'MedicalunitController@unitbaruindex')->name('unitbaru');
Route::post('/medicalunit.unitbaru.unitbaruadd', 'MedicalunitController@create')->name('unitbaruadd');
//Rawat Jalan
Route::get('/rawatjalan', 'RawatjalanController@index')->name('rawatjalan');
Route::get('/rawatjalan.tambahantrian', 'RawatjalanController@antrianbaru')->name('tambahantrian');
Route::post('/rawatjalan.tambahantrian.pilihunitmedis', 'RawatjalanController@pilihunitmedis')->name('pilihunitmedis');
Route::post('/rawatjalan.inputantrian', 'RawatjalanController@create')->name('inputantrian');
Route::post('/rawatjalan.hapusantrian', 'RawatjalanController@destroy')->name('hapusantrian');