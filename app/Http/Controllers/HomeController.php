<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('pages.index');
    }
    public function gallery() {
        return view('pages.gallery');
    }
    public function aboutMe() {
        return view('pages.about-me');
    }
}
