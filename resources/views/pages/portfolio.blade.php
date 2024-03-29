@extends('layouts.default', ['title' => 'Portfolio'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section id="portfolio" class="gallery-block grid-gallery">
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase main-header">Portfolio</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        @forelse ($categories as $category)
          {{-- <div class="col-sm-12 col-md-6 col-lg-4 p-0 category"> --}}
          <div class="category">
            <a href="/portfolio/{{ $category->category_slug }}">
              <div class="category-image">
                <img class="w-100 h-100"
                     src="{{ asset('storage/uploads/'.$category->category_slug.'/'.$category->cover_photo_url) }}"
                     alt="">
              </div>
              <div class="category-title-overlay d-flex justify-content-center align-items-center">
                <h4 class="text-uppercase text-center text-white m-0 p-0">{{ $category->name }}</h4>
              </div>
            </a>
          </div>
        @empty
          <div class="mx-auto">
            <p class="text-center">At the moment portfolio section is empty.</p>
          </div>
        @endforelse
      </div>
    </div>
  </section>
@endsection
