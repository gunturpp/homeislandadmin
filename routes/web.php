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

Route::get('image-upload',['as'=>'image.upload','uses'=>'HomestayController@create']);
Route::post('image-upload',['as'=>'image.upload.post','uses'=>'HomestayController@upload']);

Route::resource('cruds','CrudController');
Route::resource('homestays','HomestayController');