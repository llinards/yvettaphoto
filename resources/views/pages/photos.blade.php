@extends('layouts.default', ['title' => $category->name ])
@section('content')
  @include('inc.navbar', ['index' => false, 'photos' => true])
  <section id="photos">
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">
          {{ $category->name }}
        </h1>
        <div class="underline"></div>
      </div>
      @if(isset($category->description))
        <div class="row mx-auto">
          <div class="lead main-text">
            {!! $category->description  !!}
          </div>
        </div>
      @endif
      <div class="row pt-3 grid mx-auto">
        <div class="grid-sizer"></div>
        @foreach($category->images as $image)
          <div class="grid-item">
            <a
              data-fslightbox="{{$image->category->category_slug}}"
              href="{{ asset('storage/uploads/'.$image->category->category_slug.'/'.$image->image_name) }}"
            >
              <img
                class="img-fluid gallery-image"
                src="{{ asset('storage/uploads/'.$image->category->category_slug.'/'.$image->image_name) }}"
                alt="{{ $image->alt_attribute }}"
              />
            </a>
            @if(isset($image->title))
              <div class="img-title mt-2">
                <h5 class="main-header text-center text-uppercase">{{ $image->title }}</h5>
              </div>
            @endif
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const grid = document.querySelector('.grid');

      if (!grid) {
        console.warn('Grid element not found');
        return;
      }

      const galleryImages = document.querySelectorAll('.gallery-image');
      let loadedCount = 0;

      galleryImages.forEach((image) => {
        image.addEventListener('load', () => {
          loadedCount++;
          if (loadedCount === galleryImages.length) {
            new Masonry(grid, {
              itemSelector: '.grid-item',
              columnWidth: '.grid-sizer',
              gutter: 35,
              percentPosition: true
            });
          }
        });

        if (image.complete) {
          image.dispatchEvent(new Event('load'));
        }
      });
    });
  </script>
@endsection
