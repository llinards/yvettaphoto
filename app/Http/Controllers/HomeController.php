<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('layouts.app');
    }
    public function gallery() {
        return view('layouts.gallery');
    }
    public function aboutMe() {
        return view('layouts.about-me');
    }
}
