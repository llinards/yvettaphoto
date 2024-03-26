<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CategoryImagesController;
use App\Http\Controllers\CvsController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
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
  Route::post('/bildes/temp/upload', [FileUploadController::class, 'store'])->name('image_temporary.store');
  Route::delete('/bildes/temp/upload', [FileUploadController::class, 'destroy'])->name('image_temporary.destroy');

  Route::get('/', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/titulbilde/jauna', [AdminController::class, 'create'])->name('admin.cover_photo.create');
  Route::post('/titulbilde', [AdminController::class, 'store'])->name('admin.cover_photo.store');

  Route::get('/kategorijas', [CategoriesController::class, 'index'])->name('categories.index');
  Route::get('/kategorijas/jauna', [CategoriesController::class, 'create'])->name('categories.create');
  Route::post('/kategorijas', [CategoriesController::class, 'store'])->name('categories.store');
  Route::get('/kategorijas/{category}/rediget', [CategoriesController::class, 'edit'])->name('categories.edit');
  Route::patch('/kategorijas', [CategoriesController::class, 'update'])->name('categories.update');
  Route::delete('/kategorijas/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

  Route::get('/{category}/bildes', [CategoryImagesController::class, 'index'])->name('category.images.index');
  Route::post('/bildes', [CategoryImagesController::class, 'store'])->name('category.images.store');
  Route::patch('/bildes/{image}', [CategoryImagesController::class, 'update'])->name('category.images.update');
  Route::delete('/bildes/{image}', [CategoryImagesController::class, 'destroy'])->name('category.images.destroy');

  Route::get('/zinas', [NewsController::class, 'indexAdmin'])->name('news.index');
  Route::get('/zinas/jauna', [NewsController::class, 'create'])->name('news.create');
  Route::post('/zinas', [NewsController::class, 'store'])->name('news.store');
  Route::get('/zinas/{news}/rediget', [NewsController::class, 'edit'])->name('news.edit');
  Route::patch('/zinas', [NewsController::class, 'update'])->name('news.update');
  Route::delete('/zinas/bilde/{image}/dzest', [NewsController::class, 'destroyImage'])->name('news.image.destroy');
  Route::delete('/zinas/{news}', [NewsController::class, 'destroy'])->name('news.destroy');


  Route::get('/cv/edit', [CvsController::class, 'edit']);
  Route::patch('/cv', [CvsController::class, 'update']);


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
