<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index() {
        return view('pages.index');
    }
    public function gallery() {
        $categories = DB::table('categories')->select('id','name','cover_photo_url')->orderBy('created_at', 'DESC')->get();
        return view('pages.gallery', compact('categories')) ;
    }
    public function aboutMe() {
        return view('pages.about-me');
    }
}
