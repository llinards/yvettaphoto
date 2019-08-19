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

Route::get('/', 'HomeController@index');
Route::get('/gallery', 'HomeController@gallery');
Route::get('/about-me', 'HomeController@aboutMe');

Route::get('/admin', 'AdminController@index');

Route::get('/admin/kategorijas', 'CategoriesController@index');
Route::get('/admin/kategorijas/jauna', 'CategoriesController@create');
Route::post('/admin/kategorijas', 'CategoriesController@store');
Route::get('/admin/kategorijas/{category}/edit', 'CategoriesController@edit');
Route::patch('/admin/kategorijas', 'CategoriesController@update');
Route::delete('/admin/kategorijas', 'CategoriesController@destroy');