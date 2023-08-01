<?php

namespace App\Http\Controllers;

use App\Cv;
use Illuminate\Http\Request;

class CvsController extends Controller
{
  public function index()
  {
    return view('pages.cv')->with('cv', $this->getCvContent());
  }

  public function edit()
  {
    return view('admin.cv.edit')->with('cv', $this->getCvContent());
  }

  public function update(Request $data)
  {
    $data->validate([
      'cv-content' => 'required'
    ],
      [
        'cv-content.required' => 'Trūkst CV saturs!'
      ]);
    try {
      $cvToUpdate = Cv::findOrFail($data['id']);
      $cvToUpdate->update([
        'content' => $data['cv-content']
      ]);
      return redirect('/admin')->with('success', 'CV atjaunots!');
    } catch (\Exception $e) {
      return back()->with('error', 'Kļūda!');
    }
  }

  protected function getCvContent()
  {
    return Cv::first();
  }
}
