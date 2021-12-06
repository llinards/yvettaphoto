@extends('layouts.default', ['title' => 'Portfolio'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section id="portfolio" class="gallery-block grid-gallery">
    <div class="container-fluid">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase main-header">Portfolio</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        @foreach ($categories as $category)
          <div class="col-sm-12 col-md-6 col-lg-4 p-0 category">
            <a href="/portfolio/{{ $category->category_slug }}">
              <div class="category-image">
                <img class="w-100 h-100" src="/storage/{{ $category->cover_photo_url }}" alt="">
              </div>
              <div class="category-title-overlay d-flex justify-content-center align-items-center">
                <h2 class="text-uppercase text-center text-white p-0">{{ $category->name }}</h2>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
