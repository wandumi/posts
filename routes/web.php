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

Route::get('/', 'HomeController@index')->name('home');

// Authentication
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@store');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@store');

Route::post('/logout', 'Auth\LoginController@store')->name('logout')->middleware('auth');

// The front end of the site


// The back end of the site
Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');

// Posts
Route::resource('posts', 'PostController');

