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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('home');

// Route::get('image-upload',['as'=>'image.upload','uses'=>'HomestayController@store']);
// Route::post('image-upload',['as'=>'image.upload.post','uses'=>'HomestayController@update']);

Route::get('homestays/create', 'HomestayController@create');
Route::post('homestays', 'HomestayController@store');

Route::resource('cruds','CrudController');
Route::resource('homestays','HomestayController');