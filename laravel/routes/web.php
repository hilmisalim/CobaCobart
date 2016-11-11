<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registrasi', function () {
    return view('registrasi');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/admin','AdminController');

Route::resource('/surat','SuratController');
Route::get('/pengantar','SuratController@pengantar');
Route::get('/getImportSur', 'SuratController@getImportSur');
Route::post('/postImportSur', 'SuratController@postImportSur');
Route::get('/deleteAllSur', 'SuratController@deleteAllSur');
Route::get('/getExportSur', 'SuratController@getExportSur');
Route::get('/cobaPhpWord', 'SuratController@cobaPhpWord');


Route::resource('/warga','WargaController');
Route::get('/getImportWar', 'WargaController@getImportWar');
Route::post('/postImportWar', 'WargaController@postImportWar');
Route::get('/deleteAllWar', 'WargaController@deleteAllWar');
Route::get('/getExportWar', 'WargaController@getExportWar');


Route::resource('/rapat','RapatController');
Route::get('/getImportKal', 'RapatController@getImportKal');
Route::post('/postImportKal', 'RapatController@postImportKal');
Route::get('/deleteAllKal', 'RapatController@deleteAllKal');
Route::get('/getExportKal', 'RapatController@getExportKal');

Route::resource('/kas','KasController');
Route::get('/getImportKas', 'KasController@getImportKas');
Route::post('/postImportKas', 'KasController@postImportKas');
Route::get('/deleteAllKas', 'KasController@deleteAllKas');
Route::get('/getExportKas', 'KasController@getExportKas');

Route::resource('/himbauan','HimbauanController');
Route::get('/getImportHimb', 'HimbauanController@getImportHimb');
Route::post('/postImportHimb', 'HimbauanController@postImportHimb');
Route::get('/deleteAllHimb', 'HimbauanController@deleteAllHimb');
Route::get('/getExportHimb', 'HimbauanController@getExportHimb');