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

Route::get('/ebay/categoryAspects', 'Ebay\EbayTaxonomyAPI@getCategoryItemAspects');
Route::get('/ebay/categorySuggestions', 'Ebay\EbayTaxonomyAPI@getCategorySuggestions');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/products', 'Products\ProductsController@showProducts');
Route::get('/products/create', 'Products\ProductsController@createProduct');
Route::post('/products/create', 'Products\ProductsController@submitProduct');
Route::get('/products/{id}', 'Products\ProductsController@editProduct');
Route::post('/products/{id}', 'Products\ProductsController@updateProduct');

Route::get('/users', 'Users\UsersController@showUsers');
Route::get('/users/create', 'Users\UsersController@createUser');
Route::post('/users/create', 'Users\UsersController@submitUser');
Route::get('/users/{id}', 'Users\UsersController@editUser');
Route::post('/users/{id}', 'Users\UsersController@updateUser');

Route::get('/variations/attributes', 'Variations\VariationsController@showAttributes');
Route::get('/variations/attributes/create', 'Variations\VariationsController@createAttribute');
Route::post('/variations/attributes/create', 'Variations\VariationsController@submitAttribute');
Route::get('/variations/attributes/{id}', 'Variations\VariationsController@editAttribute');
Route::post('/variations/attributes/{id}', 'Variations\VariationsController@updateAttribute');
Route::get('/variations/attributes/delete/{id}', 'Variations\VariationsController@deleteAttribute');
Route::get('/variations/options', 'Variations\VariationsController@showOptions');
Route::get('/variations/options/create', 'Variations\VariationsController@createOption');
Route::post('/variations/options/create', 'Variations\VariationsController@submitOption');
Route::get('/variations/options/{id}', 'Variations\VariationsController@editOption');
Route::post('/variations/options/{id}', 'Variations\VariationsController@updateOption');
Route::get('/variations/options/delete/{id}', 'Variations\VariationsController@deleteOption');