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

Auth::routes([
    'register' => false,
    'reset' => false
  ]);


Route::middleware(['auth'])->group(function () {
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/titulbilde/jauna', 'AdminController@create');
    Route::post('/admin/titulbilde/jauna', 'AdminController@store');


    Route::get('/admin/kategorijas', 'CategoriesController@index');
    Route::get('/admin/kategorijas/jauna', 'CategoriesController@create');
    Route::post('/admin/kategorijas', 'CategoriesController@store');
    Route::get('/admin/kategorijas/{category}/edit', 'CategoriesController@edit');
    Route::patch('/admin/kategorijas', 'CategoriesController@update');
    Route::delete('/admin/kategorijas', 'CategoriesController@destroy');

    Route::get('/admin/bildes', 'ImagesController@index');
    Route::get('/admin/bildes/jaunas', 'ImagesController@create');
    Route::post('/admin/bildes', 'ImagesController@store');
    Route::get('/admin/{category}/bildes', 'ImagesController@edit');
    Route::delete('/admin/bildes', 'ImagesController@destroy');
});

Route::get('/', 'HomeController@index');
Route::get('/portfolio', 'HomeController@portfolio');
Route::get('/contact-me', 'HomeController@contactMe');
Route::get('/bio', 'HomeController@bio');
Route::get('/portfolio/{category}', 'HomeController@galleryImages');

Route::post('/send-email', 'EmailsController@sendEmail');
