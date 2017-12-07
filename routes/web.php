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
    // return view('/auth/login');
    return view('/dashboard/index');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/cruds', 'CrudsController@index');
Route::get('/homestays', 'HomestaysController@index');

Route::prefix('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});


// Route::get('image-upload',['as'=>'image.upload','uses'=>'HomestayController@store']);
// Route::post('image-upload',['as'=>'image.upload.post','uses'=>'HomestayController@update']);

// cruds
// Route::get('cruds/index', 'CrudsController@index');
Route::get('cruds/create', 'CrudController@create');
Route::post('cruds/store', 'CrudController@store');
Route::delete('cruds/destroy', 'CrudController@destroy');
Route::put('cruds/update', 'CrudController@update');
Route::get('cruds/show', 'CrudController@show');
Route::get('cruds/edit', 'CrudController@edit');

// homestays
// Route::get('homestays/index', 'HomestayController@index');
Route::get('homestays/create', 'HomestayController@create');
Route::post('homestays/store', 'HomestayController@store');
Route::delete('homestays/destroy', 'HomestayController@destroy');
Route::put('homestays/update', 'HomestayController@update');
Route::get('homestays/show', 'HomestayController@show');
Route::get('homestays/edit', 'HomestayController@edit');

// resources
Route::resource('cruds','CrudController');
Route::resource('homestays','HomestayController');

// Events
Route::resource('event', 'EventController');