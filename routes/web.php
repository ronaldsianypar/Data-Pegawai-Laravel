<?php

use Illuminate\Support\Facades\Route;

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
    return view('Login/login');
});

//Login
Route::get('/login', 'loginController@halamanlogin')->name('login');
Route::post('/login', 'loginController@login')->name('login');
Route::get('/logout', 'loginController@logout')->name('logout');

Route::group(['middleware' => ['auth']], function(){
	Route::get('/beranda', 'BerandaController@index')->name('beranda');
	//Data Pegawai
	Route::get('/data-pegawai', 'PegawaiController@index')->name('data-pegawai');
	Route::get('/create-pegawai', 'PegawaiController@create')->name('create-pegawai');
	Route::post('/simpan-pegawai', 'PegawaiController@store')->name('simpan-pegawai');
	Route::get('/edit-pegawai/{id}', 'PegawaiController@edit')->name('edit-pegawai');
	Route::post('/update-pegawai/{id}', 'PegawaiController@update')->name('update-pegawai');
	Route::get('/delete-pegawai/{id}', 'PegawaiController@destroy')->name('delete-pegawai');
	Route::get('/cetak-pegawai', 'PegawaiController@print')->name('cetak-pegawai');
	Route::get('/cetak-data-pegawai-form', 'PegawaiController@printForm')->name('cetak-data-pegawai-form');
	Route::get('/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'PegawaiController@printFormPertanggal')->name('cetak-data-pertanggal');


	//Jabatan
	Route::get('/jabatan', 'JabatanController@index')->name('jabatan');
	Route::get('/create-jabatan', 'JabatanController@create')->name('create-jabatan');
	Route::post('/simpan-jabatan', 'JabatanController@store')->name('simpan-jabatan');
	Route::get('/edit-jabatan/{id}', 'JabatanController@edit')->name('edit-jabatan');
	Route::post('/update-jabatan/{id}', 'JabatanController@update')->name('update-jabatan');
	Route::get('/delete-jabatan/{id}', 'JabatanController@destroy')->name('delete-jabatan');

});
