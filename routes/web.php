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


Route::middleware(['auth'])->prefix('/admin')->group(function () {
  Route::get('/', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/titulbilde/jauna', [AdminController::class, 'create'])->name('admin.cover_photo.create');
  Route::post('/titulbilde', [AdminController::class, 'store'])->name('admin.cover_photo.store');

  Route::get('/kategorijas', [CategoriesController::class, 'index'])->name('categories.index');
  Route::get('/kategorijas/jauna', [CategoriesController::class, 'create'])->name('categories.create');
  Route::post('/kategorijas', [CategoriesController::class, 'store'])->name('categories.store');
  Route::get('/kategorijas/{category}/rediget', [CategoriesController::class, 'edit'])->name('categories.edit');
  Route::patch('/kategorijas', [CategoriesController::class, 'update'])->name('categories.update');
  Route::delete('/kategorijas/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

  Route::get('/bildes', [ImagesController::class, 'index']);
  Route::get('/bildes/jaunas', [ImagesController::class, 'create']);
  Route::post('/bildes', [ImagesController::class, 'store']);
  Route::get('/{category}/bildes', [ImagesController::class, 'edit']);
  Route::get('/{category}/bildes/{image}', [ImagesController::class, 'getImageInfo']);
  Route::patch('/{category}/bildes/{image}', [ImagesController::class, 'setImageInfo']);
  Route::delete('/bildes', [ImagesController::class, 'destroy']);

  Route::get('/zinas/new', [NewsController::class, 'create']);
  Route::post('/zinas', [NewsController::class, 'store']);
  Route::get('/zinas/{news}/edit', [NewsController::class, 'edit']);
  Route::patch('/zinas', [NewsController::class, 'update']);
  Route::delete('/zinas/{news}/delete', [NewsController::class, 'destroy']);

  Route::get('/cv/edit', [CvsController::class, 'edit']);
  Route::patch('/cv', [CvsController::class, 'update']);

  Route::post('/upload', [ImageUploadController::class, 'store']);
  Route::delete('/upload', [ImageUploadController::class, 'destroy']);
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
