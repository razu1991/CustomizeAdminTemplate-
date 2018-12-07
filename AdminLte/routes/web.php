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

Route::get('/','Auth\LoginController@showLoginForm');

/***********************
Admin Route List
************************/
Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth','prefix' => 'admin','namespace'=>'Admin'], function () {
		//system setting route list
    	Route::resource('system/setting','SettingController')->parameters(['system/setting' => 'setting']);
    	//category route list
    	Route::resource('category','CategoryController');
    	//product route list
    	Route::resource('product','ProductController');
});



