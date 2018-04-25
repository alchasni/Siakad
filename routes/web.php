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

Route::resource('mhs','MhsController');
Route::get('viewmhs', 'MhsController@boot');
Route::get('carimhs', 'MhsController@search');
Route::post('delmhs', 'MhsController@del');
Route::post('savmhs', 'MhsController@sav');

Route::resource('dosen','DosenController');
Route::get('dosen/listmhs/{nip}', 'DosenController@listmhswali');
Route::get('viewdosen', 'DosenController@boot');
Route::get('caridosen', 'DosenController@search');
Route::post('deldosen', 'DosenController@del');
Route::post('savdosen', 'DosenController@sav');

Route::resource('matkul', 'MatkulController');
Route::get('matkul/listkelas/{kodematkul}', 'MatkulController@listkelas');
Route::get('viewmatkul', 'MatkulController@boot');
Route::get('carimatkul', 'MatkulController@search');
Route::post('delmatkul', 'MatkulController@del');
Route::post('savmatkul', 'MatkulController@sav');

Route::resource('kelas', 'KelasController');
Route::get('viewkelas', 'KelasController@boot');
Route::get('carikelas', 'KelasController@search');
Route::post('delkelas', 'KelasController@del');
Route::post('savkelas', 'KelasController@sav');

Route::resource('ambilKelas', 'AmbilKelasController');
Route::get('viewak', 'AmbilKelasController@boot');
Route::get('cariak', 'AmbilKelasController@search');
Route::post('delak', 'AmbilKelasController@del');
Route::post('savak', 'AmbilKelasController@sav');

Auth::routes();
Route::get('/home', 'HomeController@index');
