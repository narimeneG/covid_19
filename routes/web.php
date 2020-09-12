<?php
use App\Http\Controllers\InformationController;

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
    return view('user.index');
});*/
Route::get('/', 'Citoyen\ChartController@index');
Route::get('/wilaya/{id}/stats','Citoyen\ChartController@show');

//Les routes de les Categories
Route::get('admin/categories','Admin\CategorieController@index');
Route::post('admin/categories','Admin\CategorieController@store')->name('admin/categories');
Route::put('admin/categories','Admin\CategorieController@update')->name('admin/categories');
Route::delete('admin/categories','Admin\CategorieController@destroy')->name('admin/categories');

//Les routes de les Idees
Route::get('admin/idées','Admin\IdeeController@index');
Route::get('idée','Citoyen\IdeeController@create'); //user frontend
Route::post('accepte','Admin\IdeeController@accepte')->name('accepte');
Route::post('refus','Admin\IdeeController@refus')->name('refus');
Route::post('idée','Citoyen\IdeeController@store')->name('idée');//user frontend
Route::post('like','Citoyen\IdeeController@like')->name('like');//user frontend
Route::post('dislike','Citoyen\IdeeController@dislike')->name('dislike');//user frontend
Route::put('admin/idées','Admin\IdeeController@update')->name('admin/idées');
Route::delete('admin/idées','Admin\IdeeController@destroy')->name('admin/idées');
Route::get('admin/idée/{id}/show','Admin\IdeeController@show');

Route::get('admin/cateID/{id}/show','Admin\IdeeController@cateID');
 
//Les routes de les Wilayas
Route::get('admin/wilayas','Admin\WilayaController@index');
Route::post('admin/wilayas','Admin\WilayaController@store')->name('admin/wilayas');
Route::put('admin/wilayas','Admin\WilayaController@update')->name('admin/wilayas');
Route::delete('admin/wilayas','Admin\WilayaController@destroy')->name('admin/wilayas');

//Les routes de les Communes
Route::get('admin/communes','Admin\CommuneController@index');
Route::post('admin/communes','Admin\CommuneController@store')->name('admin/communes');
Route::put('admin/communes','Admin\CommuneController@update')->name('admin/communes');
Route::delete('admin/communes','Admin\CommuneController@destroy')->name('admin/communes');

//Les routes de les Chiffrers
Route::get('admin/chiffres','Admin\ChiffreController@index');
Route::post('admin/chiffres','Admin\ChiffreController@store')->name('admin/chiffres');
Route::put('admin/chiffres','Admin\ChiffreController@update')->name('admin/chiffres');
Route::delete('admin/chiffres','Admin\ChiffreController@destroy')->name('admin/chiffres');

Route::get('admin/wilaya/{id}/stats','Admin\ChiffreController@show');

//Les routes de les utilisateurs
Route::get('admin/utilisateurs','Admin\UserController@index');
Route::get('admin/utilisateur/{nom}/profile','Admin\UserController@show');

//Les routes de les Signals
Route::get('admin/signals','Admin\SignalController@index');
Route::put('admin/signals','Admin\SignalController@update')->name('admin/signals');
Route::delete('admin/signals','Admin\SignalController@destroy')->name('admin/signals');
Route::post('accepter','Admin\SignalController@accepter')->name('accepter');
Route::post('refuser','Admin\SignalController@refuser')->name('refuser');
Route::get('signal','Citoyen\SignalController@create');
Route::post('signal','Citoyen\SignalController@store')->name('signal');
Route::get('admin/signal/{id}/show','Admin\SignalController@show');

//Les pub
Route::get('publication','Citoyen\InformationController@index');

//Les admins
Route::get('admin/Admins','Admin\AdminController@index');
Route::post('admin/Admins','Admin\AdminController@store')->name('admin/Admins');
Route::get('admin/{id}/edit','Admin\AdminController@edit');
Route::get('admin/{id}/show','Admin\AdminController@show');
Route::get('admin/{id}/profile','Admin\AdminController@profile');
Route::put('admin/{id}','Admin\AdminController@update');
Route::put('admin/{id}/privateinfo','Admin\AdminController@updat');
Route::put('admin/{id}/password','Admin\AdminController@updateP');
Route::delete('admin/Admins','Admin\AdminController@destroy')->name('admin/Admins');

Route::get('admin/statistique','Admin\ChartController@index');
//Route::get('admin/statistique','ChartController@chart');
Route::get('test','ChartController@getAllMonths');

Route::get('admin/info','Admin\InformationController@index');
Route::get('admin/pub/{id}/show','Admin\InformationController@show');

//Citoyen profile
Route::get('user/{id}/profile','Citoyen\UserController@profile');
Route::get('user/{id}/edit','Citoyen\UserController@edit');
Route::put('user/{id}','Citoyen\UserController@update');
Route::put('user/{id}/privateinfo','Citoyen\UserController@updat');
Route::put('user/{id}/password','Citoyen\UserController@updateP');


//Route::get('/register', 'Auth\RegisterController@index');
Route::get('/register', function () {
    if(!Auth::check())
    return view('auth.register2');
});
Route::post('/inscri','Auth\RegisterController@register')->name('inscription');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/logout', 'Auth\LoginController@logout')->name('user.logout');


Route::prefix('admin')->group(function(){
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/statistique', 'Admin\ChartController@index')->name('admin');

    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
});


