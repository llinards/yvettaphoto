<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\News;
use App\Services\FileService;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        $allNews = News::orderBy('created_at', 'DESC')->get();
        return view('pages.news', compact('allNews'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(StoreNewsRequest $data, FileService $fileService)
    {
        try {
            $news = News::create([
                'title' => $data['news-title'],
                'description' => $data['news-description']
            ]);
            foreach ($data['multiple-img-upload'] as $image) {
                $imageUrl = $fileService->storePhotos($image, 'news');
                $news->images()->create([
                    'image_location' => $imageUrl
                ]);
            }
            return redirect('/admin')->with('success', 'Ziņa pievienota!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('error', 'Kļūda!');
        }
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(UpdateNewsRequest $data, FileService $fileService)
    {
        try {
            $newsToUpdate = News::findOrFail($data['id']);
            $newsToUpdate->update([
                'title' => $data['news-title'],
                'description' => $data['news-description']
            ]);
            if (isset($data['multiple-img-upload'])) {
                foreach ($newsToUpdate->images as $image) {
                    $fileService->destroyPhoto($image->image_location);
                }
                $newsToUpdate->images()->delete();
                foreach ($data['multiple-img-upload'] as $image) {
                    $imageUrl = $fileService->storePhotos($image, 'news');
                    $newsToUpdate->images()->create([
                        'image_location' => $imageUrl
                    ]);
                }
            }
            return redirect('/admin')->with('success', 'Ziņa atjaunota!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('error', 'Kļūda!');
        }
    }

    public function destroy(News $news, FileService $fileService)
    {
        try {
            foreach ($news->images as $image) {
                $fileService->destroyPhoto($image->image_location);
            }
            $news->delete();
            return back()->with('success', 'Ziņa izdzēsta!');
        } catch (\Exception $e) {
            Log::error($e);
            return back()->with('error', 'Kļūda!');
        }
    }
}
