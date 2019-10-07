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

/*Route::get('/', function () {
	return view('welcome');
});*/

//Route::auth();
Route::get('/', 'Controller@index')->name('home');
Auth::routes();
Route::get('/dashboard/shortUrl/create', 'Dashboard\ShortUrl\ShortUrlController@create')->name('createShortUrl');
Route::get('/dashboard/shortUrl/edit', 'Dashboard\ShortUrl\ShortUrlController@edit')->name('editShortUrl');
Route::get('/dashboard/shortUrl/delete', 'Dashboard\ShortUrl\ShortUrlController@delete')->name('deleteShortUrl');
Route::get('/dashboard', 'Dashboard\DashboardController@loadDahsboard')->name('dashboard');
Route::post('/dashboard/shortUrl/save', 'Dashboard\ShortUrl\ShortUrlController@save')->name('saveShortUrl');
Route::post('/', 'Controller@saveGuestUrl')->name('saveAsGuest');
Route::get('{code}', 'RedirectController@redirect')->name('redirect');
