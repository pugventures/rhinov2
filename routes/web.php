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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/dashboard', 'Dashboard\DashboardController@showDashboard');

Route::get('/users', 'Users\UsersController@showUsers');
Route::get('/users/create', 'Users\UsersController@createUser');
Route::post('/users/create', 'Users\UsersController@submitUser');
Route::get('/users/{id}', 'Users\UsersController@editUser');
Route::post('/users/{id}', 'Users\UsersController@updateUser');
