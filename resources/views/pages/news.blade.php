@extends('layouts.default', ['title' => 'News'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">news</h1>
        <div class="underline"></div>
      </div>
      @foreach($allNews as $newsItem)
        <div class="row">
          <div class="col-lg col-sm-12 d-flex flex-column justify-content-center news-item-content">
            <h4 class="main-header mb-3">{{ $newsItem->title }}</h4>
            {!! $newsItem->description !!}
            <p class="small main-text">{{ date_format($newsItem->created_at, "d/m/Y") }}</p>
          </div>
          <div class="col-lg col-sm-12 d-flex flex-column align-items-lg-end align-items-center justify-content-center">
            <div class="row justify-content-lg-end justify-content-center">
              @foreach($newsItem->images as $image)
                <div class="col-sm-6 col-12 d-flex justify-content-center">
                  <img src="{{asset('/storage/uploads/news/'.$image->image_location)}}" class="img-fluid my-2" alt="">
                </div>
              @endforeach
            </div>
          </div>
        </div>
        <hr>
  @endforeach
@stop
