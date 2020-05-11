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
    Route::get('/', 'DataCenterController@index')->name('home');
    Route::get('/physical-host', 'PhysicalHostController@index')->name('physical-host');
    Route::get('/select-server', 'SelectServerController@index')->name('select-server');
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

    Route::get('/select-server/add', 'SelectServerController@add')->name('select-server/add');
    Route::post('/select-server/add', 'SelectServerController@add')->name('select-server/add');
    Route::get('/select-server/edit', 'SelectServerController@edit')->name('select-server/edit');
    Route::post('/select-server/edit', 'SelectServerController@edit')->name('select-server/edit');
    Route::post('/select-server/delete', 'SelectServerController@delete')->name('select-server/delete');
    Route::get('/select-server/delete', 'SelectServerController@index')->name('select-server/delete');
});









