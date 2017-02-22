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
    return redirect('login');
});
Route::resource('jabatan','JabatanController');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::resource('golongan','GolonganController@index');
Route::resource('/pegawai','PegawaiController');
Route::resource('/tunjangan','TunjanganController');
Route::resource('tunjanganpegawai','TunjanganPController');
Route::resource('kategori','KategoriLemburController');
Route::resource('lembur','LemburController');
