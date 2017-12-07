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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});


// Route::get('image-upload',['as'=>'image.upload','uses'=>'HomestayController@store']);
// Route::post('image-upload',['as'=>'image.upload.post','uses'=>'HomestayController@update']);

Route::get('homestays/create', 'HomestayController@create');
Route::post('homestays', 'HomestayController@store');

Route::resource('cruds','CrudController');
Route::resource('homestays','HomestayController');
