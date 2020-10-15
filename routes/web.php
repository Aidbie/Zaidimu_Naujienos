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
Route::get('/home', 'zaidimaiController@home');

Route::get('/', function () {
    return view('home');
});
Route::get('/zaidimas', 'zaidimaiController@index')->name('zaidimas');
Route::get('/kontaktai', 'zaidimaiController@kontaktai')->name('kontaktai');
Route::get('/zaidimai/{num}', 'zaidimaiController@zaidimaim')->name('zaidimas');
Route::get('/zaidimai/{num}/{name}', 'zaidimaiController@zaidimovid');
Route::get('/kurejai', 'kurejaiController@index');
Route::get('/kurejai/{name}', 'kurejaiController@vidus');

Route::get('/main', 'loginController@index');
Route::post('/main/checklogin', 'loginController@checklogin');
Route::get('/main/successlogin', 'loginController@successlogin');
Route::get('main/logout', 'loginController@logout');

Route::get('auth/login', 'Auth\LoginController@getLogin');
Route::post('auth/login', 'Auth\LoginController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/zaidimas/naujas', 'zaidimaiController@naujzaid');
Route::post('zaidimas/pridetiZaidima/','zaidimaiController@pridetizaidima');
Route::get('zaidimas/pasalintiZaidima/{id}', 'zaidimaiController@deleteZaidima')->name('deleteZaidima');
Route::get('zaidimas/edit/{id}','zaidimaiController@redaguotizaidima')->name('editzaidima');
Route::post('zaidimas/confirmedit/{id}', 'zaidimaiController@pavykoredaguotizaidima')->name('confirmzaidima');

Route::get('/kurejas/naujas', 'kurejaiController@naujkure');
Route::post('kurejas/pridetiKureja/','kurejaiController@pridetikureja');
Route::get('kurejas/edit/{id}','kurejaiController@redaguotikureja')->name('editKureja');
Route::post('kurejas/confirmedit/{id}', 'kurejaiController@pavykoredaguotikureja')->name('confirmKureja');
Route::get('kurejas/pasalintiKureja/{id}', 'kurejaiController@deleteKureja')->name('deleteKureja');

Route::get('/atsiliepimas/{id}', 'komentController@naujatsi')->name('naujatsi');
Route::post('atsiliepimas/pridetiatsiliepima/{id}','komentController@pridetiatsiliepima');
Route::get('atsiliepimas/pasalintiatsiliepima/{id}', 'komentController@deleteAtsiliepima')->name('deleteAtsiliepima');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
