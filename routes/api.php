<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\HomeController;

Route::get('/{category}', [HomeController::class, 'galleryImages']);