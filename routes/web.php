<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index');


// customer
Route::get('/customer','App\Http\Controllers\CustomerController@tampil');
Route::get('/customer/tambah','App\Http\Controllers\CustomerController@tambah');
Route::post('/customer/store','App\Http\Controllers\CustomerController@simpan');
Route::get('/customer/lihat/{id_cust}','App\Http\Controllers\CustomerController@lihat');
Route::get('/customer/ubah/{id_cust}','App\Http\Controllers\CustomerController@ubah');
Route::post('/customer/edit','App\Http\Controllers\CustomerController@edit');
Route::get('/hapus/{id_cust}','App\Http\Controllers\CustomerController@hapus');

// kamar
Route::get('/kamar','App\Http\Controllers\KamarController@tampil');
Route::get('/kamar/tambah','App\Http\Controllers\KamarController@tambah');
Route::post('/kamar/store','App\Http\Controllers\KamarController@simpan');
Route::get('/kamar/ubah/{id_kamar}','App\Http\Controllers\KamarController@ubah');
Route::post('/kamar/edit','App\Http\Controllers\KamarController@edit');
Route::get('/hapus/{id_kamar}','App\Http\Controllers\KamarController@hapus');

// user
Route::get('/user','App\Http\Controllers\UserController@tampil');
Route::get('/user/tambah','App\Http\Controllers\UserController@tambah');
Route::post('/user/store','App\Http\Controllers\UserController@simpan');
Route::get('/user/ubah/{id}','App\Http\Controllers\UserController@ubah');
Route::post('/user/edit','App\Http\Controllers\UserController@edit');
Route::get('/hapus/{id}','App\Http\Controllers\UserController@hapus');

// role
Route::get('/role','App\Http\Controllers\RoleController@tampil');

// transaksi
Route::get('/transaksi','App\Http\Controllers\TransaksiController@tampil');
Route::get('/transaksi/tambah','App\Http\Controllers\TransaksiController@tambah');
Route::post('/transaksi/store','App\Http\Controllers\TransaksiController@simpan');
Route::get('/hapus/{id_transaksi}','App\Http\Controllers\TransaksiController@hapus');

Route::get('/get-cust-info/{id_cust}', 'App\Http\Controllers\TransaksiController@getCustInfo');
Route::get('/get-kamar-info/{id_kamar}', 'App\Http\Controllers\TransaksiController@getKamarInfo');

// akun
// Route::get('/akun','App\Http\Controllers\AkunController@admin');
Route::get('/akun/resepsionis','App\Http\Controllers\AkunController@resepsionis');
// Route::get('/akun/ubah/{id}','App\Http\Controllers\UserController@ubah');
// Route::post('/akun/edit}','App\Http\Controllers\UserController@edit');
// Route::get('/hapus/{id}','App\Http\Controllers\UserController@hapus');

// laporan
Route::get('/laporan','App\Http\Controllers\LaporanController@index');
Route::get('/laporan/cetak_customer_pdf','App\Http\Controllers\CustomerController@cetak_customer_pdf');

Route::get('/laporan/cetak_transaksi_pdf','App\Http\Controllers\TransaksiController@cetak_transaksi_pdf');

Route::get('/home_admin', function () {
    return view('home-admin');
});

