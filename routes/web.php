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

Route::get('home', function(){
    return view('welcome');
})->name('home');

// Authentication
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@store');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@store');

Route::post('/logout', 'Auth\LoginController@store')->name('logout');

// The front end of the site


// The back end of the site
Route::get('/dashboard', 'Backend\DashboardController@index')->name('dashboard');

// Posts
Route::get('download', 'CertificateController@download')->name('download');
Route::get('certificates', 'CertificateController@index')->name('certificates');
// the download url, its a post, get is also working 
Route::post('certificate', 'CertificateController@certificate')->name('certificate');
Route::post('design', 'CertificateController@store')->name('design');
Route::resource('posts', 'PostController');

Route::post('pdf', 'CertificateController@pdf');
Route::get('pdfs', 'CertificateController@pdfs');


Route::post('/typeform/webhook', 'TypeformController@webhook')->name('typeform.webhook');

Route::post('/typeform/hooks', 'TypeformController@hooks')->name('typeform.hooks');

Route::get('view', 'TypeformController@view');

Route::get('zoho/oauth', 'ZohoController');

Route::get('/login/facebook', 'FaceworkController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'FaceworkController@handleProviderFacebookCallback');
 
 

Route::get('facebook', 'FaceworkController@home')->name('facebook');

Route::get('fb_user', 'FacebookcrudController@retrieveUserProfile');

Route::post('sendfb', 'FacebookcrudController@publishToProfile');

Route::get('fbook', 'FbookController@index')->name('fbook');

// Route::get('resize', function(){
//     $image = Image::make('Social_bg.jpg')->resize(300, 200);
//     return $image->response('jpg');
// });


Route::get('/shared/image', 'CertificateController@downloadCertificateImage');