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
    return redirect()->route('login');
});

Auth::routes();

Route::group([
	'middleware' => 'auth'
], function(){
	Route::get('dashboard', 'HomeController@index')->name('dashboard');
	Route::resource('company', 'CompanyController');
	Route::resource('person', 'PersonController');
	Route::resource('address', 'AddressController');
	Route::post('company/default_person','CompanyController@default_person')->name('default_person');

});

