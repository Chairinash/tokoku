<?php
use App\Warna;
use App\Barang;
use Illuminate\Http\Request;
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
Route::group(['middleware' => 'auth'], function(){

});

Route::post('barang/store', 'BarangController@insertData')->name('barang.store');

Route::get('barang', 'BarangController@allBarang')->name('barang.index');

Route::get('barang/show/{id}', 'BarangController@cariBarangId')->name('barang.detail');

Route::get('barang/create', 'BarangController@createBarang')->name('barang.create');

Route::get('barang/edit/{id}', 'BarangController@editBarang')->name('barang.edit');

Route::put('barang/update/{id}', 'BarangController@updateBarang')->name('barang.update');

Route::delete('barang/delete/{id}', 'BarangController@deleteBarang')->name('barang.delete');


Route::post('/warna/store', 'WarnaController@insertData')->name('warna.store');

Route::get('warna', 'WarnaController@allWarna')->name('warna.index');

Route::get('warna/show/{id}', 'WarnaController@cariWarnaId')->name('warna.detail');

Route::put('warna/update/{id}', 'WarnaController@updateWarna')->name('warna.update');

Route::get('warna/create', 'WarnaController@createWarna')->name('warna.create');

Route::get('warna/edit/{id}', 'WarnaController@editWarna')->name('warna.edit');

Route::delete('warna/delete/{id}', 'WarnaController@deleteWarna')->name('warna.delete');

Route::get('order', 'OrderController@index')->name('order.index');












Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

