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
    return view('admin/login');
});


Route::group(['prefix' => 'admin'], function () {
    
    Route::group(['middleware' => 'CheckLogin'], function() {
        
            Route::get('login', function () {
                           return view('admin/login');
                     })->name('admin.login');
            Route::post('authenticate', 'LoginController@authenticate');
            
       });
       
    Route::group(['middleware' => 'admin'], function () {
            Route::post('logout', function () {
                    Auth::guard('admin')->logout();
                    return redirect('admin/login');
                });
           /*
            * Authorise route list
            */
           //change password route
           Route::get('changePassword','AdminController@changePassword');
           Route::post('changePassword','AdminController@updatePassword');
           //profile route
           Route::get('profile','AdminController@profileView');
           Route::post('profile','AdminController@updateProfile');
           //basic setting route list
           Route::get('basicSetting','GeneralSettingController@basicSetting');
           Route::post('basicSetting/{basicSetting}','GeneralSettingController@updateBasicSetting');
           //sms setting route list
           Route::get('smsSetting','GeneralSettingController@smsSetting');
           Route::post('smsSetting/{smsSetting}','GeneralSettingController@updateSmsSetting');
           //email setting route list
           Route::get('emailSetting','GeneralSettingController@emailSetting');
           Route::post('emailSetting/{emailSetting}','GeneralSettingController@updateEmailSetting');
           //dashboard
           Route::get('dashboard','AdminController@dashboard');
    });
    
});