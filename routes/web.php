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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/datacenter', 'DataCenterController@index')->name('datacenter');
    Route::get('/datacenter/details', 'DataCenterController@details')->name('datacenter/details');
    Route::get('/physical-host', 'PhysicalHostController@index')->name('physical-host');
    Route::get('/physical-host/details', 'PhysicalHostController@details')->name('physical-host/details');
    Route::get('/select-server/details', 'SelectServerController@details')->name('select-server/details');

    //web api
    Route::get('saveConfig', 'UserController@saveConfig')->name('saveConfigAPI');

});
Route::group(['middleware' => 'admin'], function () {
    Route::get('/datacenter/add', 'DataCenterController@add')->name('datacenter/add');
    Route::post('/datacenter/add', 'DataCenterController@add')->name('datacenter/add');
    Route::get('/datacenter/edit', 'DataCenterController@edit')->name('datacenter/edit');
    Route::post('/datacenter/edit', 'DataCenterController@edit')->name('datacenter/edit');
    Route::post('/datacenter/delete', 'DataCenterController@delete')->name('datacenter/delete');
    Route::get('/datacenter/delete', 'DataCenterController@index')->name('datacenter/delete');

    Route::get('/physical-host/add', 'PhysicalHostController@add')->name('physical-host/add');
    Route::post('/physical-host/add', 'PhysicalHostController@add')->name('physical-host/add');
    Route::get('/physical-host/edit', 'PhysicalHostController@edit')->name('physical-host/edit');
    Route::post('/physical-host/edit', 'PhysicalHostController@edit')->name('physical-host/edit');
    Route::post('/physical-host/delete', 'PhysicalHostController@delete')->name('physical-host/delete');
    Route::get('/physical-host/delete', 'PhysicalHostController@index')->name('physical-host/delete');

    Route::get('/user', 'UserController@index')->name('user');
    Route::get('/user/edit', 'UserController@edit')->name('user/edit');
    Route::post('/user/edit', 'UserController@edit')->name('user/edit');
    Route::post('/user/delete', 'UserController@delete')->name('user/delete');
    
    
});
Route::post('/upload-image/upload', 'UploadImageController@upload')->name('upload-image/upload');
Route::get('/upload-image', 'UploadImageController@index')->name('upload-image');








