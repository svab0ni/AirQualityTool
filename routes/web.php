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

Route::get('/', 'IndexController@index')->name('index');
Route::post('/login', 'Auth\LoginController@authenticated');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/confirm/phone-number', 'UserController@confirmPhoneNumber');
Route::post('/assign/risk-groups', 'UserController@assignRiskGroups');


Route::post('/newsletter/store', 'NewsletterController@storeNewsletterSubscription');

Route::get('/newsletter', 'NewsletterController@index')->name('newsletter');
