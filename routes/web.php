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
Route::get('/resetPetugasBumdes', 'UserController@resetpassPetugasBumdes');
Route::post('/resetPetugasBumdes', 'UserController@resetpasswordPetugasBumdes');
Route::get('/resetPetugasToko', 'UserController@resetpassPetugasToko');
Route::post('/resetPetugasToko', 'UserController@resetpasswordPetugasToko');

Auth::routes();
//Home
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/tampil_dashboardAdmin', 'HomeController@showDBAdmin');
Route::get('/tampil_dashboardBumdes', 'HomeController@showDBBumdes');
Route::get('/tampil_dashboardToko', 'HomeController@showDBToko');


//Barang
Route::get('/tambah_barang', 'BarangController@add');
Route::post('/tambah_barang', 'BarangController@save');
Route::get('/tampil_barang', 'BarangController@index');
Route::get('/edit_barang/{id}', 'BarangController@edit');
Route::post('/edit_barang/{id}', 'BarangController@update');
Route::get('/hapus_barang/{id}','BarangController@destroy');
Route::get('/detail_barang/{id}', 'BarangController@detail');


//Petugas
Route::get('/tambah_petugas', 'UserController@addPetugas');
Route::post('/tambah_petugas', 'UserController@savePetugas');
Route::get('/tampil_petugas', 'UserController@index');
Route::get('/edit_petugas/{id}', 'UserController@editPetugas');
Route::post('/edit_petugas/{id}', 'UserController@updatePetugas');
Route::get('/hapus_petugas/{id}','UserController@deletePetugas');
Route::get('/reset_password/{id}', 'UserController@resetPassword');
Route::get('/profilBumdes/{id}', 'UserController@editProfilBumdes');
Route::post('/profilBumdes/{id}', 'UserController@updateProfilBumdes');
Route::get('/profilToko/{id}', 'UserController@editProfilToko');
Route::post('/profilToko/{id}', 'UserController@updateProfilToko');


//Toko
Route::get('/tambah_toko', 'TokoController@add');
Route::post('/tambah_toko', 'TokoController@save');
Route::get('/tampil_toko', 'TokoController@index');
Route::get('/edit_toko/{id}', 'TokoController@edit');
Route::post('/edit_toko/{id}', 'TokoController@update');
Route::get('/hapus_toko/{id}','TokoController@destroy');


//Transaksi
Route::get('/tambah_transaksi', 'TransaksiController@add');
Route::get('/tambah_transaksi/barang/{id}', 'TransaksiController@barang');
Route::post('/tambah_transaksi', 'TransaksiController@save');
Route::get('/tampil_transaksi', 'TransaksiController@index');
Route::get('/edit_transaksi/{id}', 'TransaksiController@edit');
Route::post('/edit_transaksi/{id}', 'TransaksiController@update');
Route::get('/hapus_transaksi/{id}','TransaksiController@destroy');
Route::get('/detail_transaksi/{id}', 'TransaksiController@detail');
Route::post('/edit_transaksi/{id}/item/add', 'TransaksiController@addItem');
Route::get('/edit_transaksi/{id}/item', 'TransaksiController@edit_item');
Route::post('/edit_transaksi/{id}/item', 'TransaksiController@saveItem');
Route::get('/edit_transaksi/{id1}/{id2}/delete', 'TransaksiController@destroyItem');
Route::get('/edit_transaksi/{id1}/{id2}', 'TransaksiController@edit_detail');
Route::post('/edit_transaksi/{id1}/{id2}', 'TransaksiController@update_detail');
Route::get('/edit_transaksi_detail/detail/{id}', 'TransaksiController@edit_detail');
Route::post('/edit_transaksi_detail/detail/{id}', 'TransaksiController@saveDetail');
Route::post('/search_transaksi', 'TransaksiController@cari');




//Jenis
Route::get('/tambah_jenis', 'JenisController@add');
Route::post('/tambah_jenis', 'JenisController@save');
Route::get('/tampil_jenis', 'JenisController@index');
Route::get('/edit_jenis/{id}', 'JenisController@edit');
Route::post('/edit_jenis/{id}', 'JenisController@update');
Route::get('/hapus_jenis/{id}','JenisController@destroy');

//Barang yang ada ditoko (Gudang Toko)
Route::get('/tampil_gudangToko', 'GudangTokoController@index');

//PetugasTokoBarang
Route::get('/tambah_petugasToko', 'UserController@addPetugasToko');
Route::post('/tambah_petugasToko', 'UserController@savePetugasToko');
Route::get('/tampil_petugasToko', 'UserController@indexPetugasToko');
Route::get('/edit_petugasToko/{id}', 'UserController@editPetugasToko');
Route::post('/edit_petugasToko/{id}', 'UserController@updatePetugasToko');
Route::get('/hapus_petugasToko/{id}','UserController@deletePetugasToko');

//Transaksi di Toko
Route::get('/tambah_transaksiToko', 'TransaksiTokoController@add');
Route::post('/tambah_transaksiToko', 'TransaksiTokoController@save');
Route::get('/tampil_transaksiToko', 'TransaksiTokoController@index');
Route::get('/edit_transaksiToko/{id}', 'TransaksiTokoController@edit');
Route::get('/detail_transaksiToko/{id}', 'TransaksiTokoController@detail');
Route::post('/edit_transaksiToko/{id}', 'TransaksiTokoController@update');
Route::get('/hapus_transaksiToko/{id}','TransaksiTokoController@destroy');
Route::get('/edit_transaksiToko/{id}/item', 'TransaksiTokoController@edit_item');
Route::post('/edit_transaksiToko/{id}/item/', 'TransaksiTokoController@addItem');
//Route::get('/edit_transaksiToko_detail/detail/{id}', 'TransaksiTokoController@edit_detail');
Route::get('/edit_transaksiToko/{id1}/item/{id2}', 'TransaksiTokoController@edit_detail');
Route::post('/edit_transaksiToko/{id1}/item/{id2}', 'TransaksiTokoController@saveDetail');
Route::get('/edit_transaksiToko/{id1}/{id2}/delete', 'TransaksiTokoController@destroyItem');
Route::post('/search_transaksiToko', 'TransaksiTokoController@cari');
//Route::get('/data_gudang', 'HomeController@gudang')->name('gudang');
//Route::get('/data_petugas', 'HomeController@petugas')->name('petugas');
//Route::get('/data_toko', 'HomeController@toko')->name('toko');
//Route::get('/rekap_transaksi', 'HomeController@rekap_transaksi')->name('rekap_transaksi');





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
