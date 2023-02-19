<?php

namespace App\Http\Controllers;

use App\Cv;
use Illuminate\Http\Request;

class CvsController extends Controller
{
  public function index()
  {
    $cv = Cv::first();
    return view('pages.cv', compact('cv'));
  }
}
