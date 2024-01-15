<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CvsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\NewsController;
use Spatie\Honeypot\ProtectAgainstSpam;

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
  Route::get('/admin', [AdminController::class, 'index']);
  Route::get('/admin/titulbilde/jauna', [AdminController::class, 'create']);
  Route::post('/admin/titulbilde/jauna', [AdminController::class, 'store']);

  Route::get('/admin/kategorijas', [CategoriesController::class, 'index']);
  Route::get('/admin/kategorijas/jauna', [CategoriesController::class, 'create']);
  Route::post('/admin/kategorijas', [CategoriesController::class, 'store']);
  Route::get('/admin/kategorijas/{category}/edit', [CategoriesController::class, 'edit']);
  Route::patch('/admin/kategorijas', [CategoriesController::class, 'update']);
  Route::get('/admin/kategorijas/{category:id}/delete', [CategoriesController::class, 'destroy']);

  Route::get('/admin/bildes', [ImagesController::class, 'index']);
  Route::get('/admin/bildes/jaunas', [ImagesController::class, 'create']);
  Route::post('/admin/bildes', [ImagesController::class, 'store']);
  Route::get('/admin/{category}/bildes', [ImagesController::class, 'edit']);
  Route::get('/admin/{category}/bildes/{image}', [ImagesController::class, 'getImageInfo']);
  Route::patch('/admin/{category}/bildes/{image}', [ImagesController::class, 'setImageInfo']);
  Route::delete('/admin/bildes', [ImagesController::class, 'destroy']);

  Route::get('/admin/zinas/new', [NewsController::class, 'create']);
  Route::post('/admin/zinas', [NewsController::class, 'store']);
  Route::get('/admin/zinas/{news}/edit', [NewsController::class, 'edit']);
  Route::patch('/admin/zinas', [NewsController::class, 'update']);
  Route::delete('/admin/zinas/{news}/delete', [NewsController::class, 'destroy']);

  Route::get('/admin/cv/edit', [CvsController::class, 'edit']);
  Route::patch('/admin/cv', [CvsController::class, 'update']);

  Route::post('/admin/upload', [ImageUploadController::class, 'store']);
  Route::delete('/admin/upload', [ImageUploadController::class, 'destroy']);
});

Route::get('/', static function () {
  return view('pages.index');
});
Route::get('/portfolio', [HomeController::class, 'getAllCategories']);
Route::get('/contact-me', static function () {
  return view('pages.contact-me');
});
Route::get('/bio', static function () {
  return view('pages.bio');
});
Route::get('/artist-statement', static function () {
  return view('pages.artist-statement');
});
Route::get('/cv', [CvsController::class, 'index']);
Route::get('/news', [NewsController::class, 'index']);
Route::get('/purchase', static function () {
  return view('pages.purchase');
});
Route::get('/portfolio/{category}', [HomeController::class, 'getAllCategoryImages']);
Route::post('/send-email', [EmailsController::class, 'send'])->middleware(ProtectAgainstSpam::class);
