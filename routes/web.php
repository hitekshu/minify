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



// Home Page
Route::get('/', 'Controller@index')->name('home');

// Authentication Routes
Auth::routes();

// Routes to Add/EditDelete short urls
Route::get('/dashboard/shortUrl/create', 'Dashboard\ShortUrl\ShortUrlController@create')->name('createShortUrl');
Route::get('/dashboard/shortUrl/edit', 'Dashboard\ShortUrl\ShortUrlController@edit')->name('editShortUrl');
Route::get('/dashboard/shortUrl/delete', 'Dashboard\ShortUrl\ShortUrlController@delete')->name('deleteShortUrl');
Route::post('/dashboard/shortUrl/save', 'Dashboard\ShortUrl\ShortUrlController@save')->name('saveShortUrl');

// Dashboard Home page Route
Route::get('/dashboard', 'Dashboard\DashboardController@loadDahsboard')->name('dashboard');

// Route for guests to generate minified URL
Route::post('/', 'Controller@saveGuestUrl')->name('saveAsGuest');

// Route that redirects all minified URL's to full urls
Route::get('{code}', 'RedirectController@redirect')->name('redirect');
