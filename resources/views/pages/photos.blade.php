@extends('layouts.default', ['title' => $category->name ])
@section('content')
  @include('inc.navbar', ['index' => false, 'photos' => true])
  {{--    <category-photos category="{{ $category->category_slug }}"></category-photos>--}}
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
              href="{{ asset('storage/'.$image->image_name) }}"
            >
              <img
                class="img-fluid gallery-image"
                src="{{ asset('storage/'.$image->image_name) }}"
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
  @include('inc.masonry')
@endsection
