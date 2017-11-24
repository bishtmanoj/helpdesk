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

Route::group(['middleware' => ['auth'], 'prefix' => \Session::get('locale')], function () {
    Route::get('logout', 'SessionsController@distroy')->name('sessions.logout');
    Route::get('profile', 'AccountController@profile')->name('user.profile');
    Route::post('profile', 'AccountController@store');

    Route::get('tickets', 'TicketsController@index')->name('ticket.list');
    Route::get('tickets/open', 'TicketsController@index')->name('ticket.open');
    Route::get('tickets/add', 'TicketsController@create')->name('ticket.add');
    Route::post('tickets/add', 'TicketsController@store');
});

Route::group(['middleware' => ['auth', 'admin'], 'prefix' => \Session::get('locale')], function () {

    Route::get('tickets/{id}/edit', 'TicketsController@create')->name('ticket.edit');
    Route::post('tickets/{id}/edit', 'TicketsController@store');

    Route::get('departments', 'DepartmentsController@index')->name('department.list');
    Route::get('departments/add', 'DepartmentsController@create')->name('department.add');
    Route::get('departments/{id}/edit', 'DepartmentsController@create')->name('department.edit');
    Route::post('departments/{id}/edit', 'DepartmentsController@store');
    Route::post('departments/add', 'DepartmentsController@store');
    Route::post('departments/{id}/delete', 'DepartmentsController@distroy')->name('department.delete');

    Route::get('requests', 'RequestsController@index')->name('request.list');
    Route::get('requests/add', 'RequestsController@create')->name('request.add');
    Route::get('requests/{id}/edit', 'RequestsController@create')->name('request.edit');
    Route::post('requests/{id}/edit', 'RequestsController@store');
    Route::post('requests/add', 'RequestsController@store');
    Route::post('requests/{id}/delete', 'RequestsController@distroy')->name('request.delete');


    Route::get('devices', 'DevicesController@index')->name('device.list');
    Route::get('devices/add', 'DevicesController@create')->name('device.add');
    Route::get('devices/{id}/edit', 'DevicesController@create')->name('device.edit');
    Route::post('devices/{id}/edit', 'DevicesController@store');
    Route::post('devices/add', 'DevicesController@store');
    Route::post('devices/{id}/delete', 'DevicesController@distroy')->name('device.delete');

    Route::get('users', 'UsersController@index')->name('users.list');
    Route::get('users/add', 'UsersController@create')->name('users.add');
    Route::get('users/{id}/edit', 'UsersController@create')->name('users.edit');
    Route::post('users/{id}/edit', 'UsersController@store');
    Route::post('users/add', 'UsersController@store');
    Route::post('users/{id}/delete', 'UsersController@distroy')->name('users.delete');
});
Route::group(['middleware' => ['guest'], 'prefix' => \Session::get('locale')], function () {

    Route::get('/', 'SessionsController@login')->name('sessions.login');
    Route::get('login', 'SessionsController@login')->name('sessions.login');
    Route::get('login', 'SessionsController@login')->name('login');
    Route::post('/', 'SessionsController@store');
    Route::post('login', 'SessionsController@store');
    Route::get('password/request', 'SessionsController@password_request')->name('password.request');
    Route::post('password/request', 'SessionsController@send_reset_link');
    Route::get('password/reset/{token}', 'SessionsController@reset_password')->name('reset_password');
    Route::post('password/reset/{token}', 'SessionsController@update_password');

    Route::get('signup', 'RegistersController@signup')->name('sessions.signup');

    Route::post('signup', 'RegistersController@store');
});

Route::get('{locale}/locale', 'SessionsController@locale')->name('locale');
