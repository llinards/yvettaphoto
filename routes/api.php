<?php

use Illuminate\Http\Request;

Route::get('/{category}', 'Api\\HomeController@galleryImages');