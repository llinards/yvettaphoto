@extends('layouts.default', ['title' => $category->name ])
@section('content')
    @include('inc.navbar', ['index' => false, 'photos' => true])
    <section class="py-5" id="photos">
        <div class="container-fluid">
            <div class="row mt-5 justify-content-center">
                <div class="heading">
                    <h1 class="display-4 text-uppercase text-center main__headings">{{ $category->name }}</h1>
                    <div class="underline"></div>
                </div>
            </div>
            @if($category->description)
                <div class="container">
                    <div class="row pt-3 justify-content-center">
                        <div class="lead text-justify description__p">{!! $category->description !!}</div>
                    </div>
                </div>
            @endif
            <div class="row pt-3 images-container grid">
                @if(!$images->isEmpty())
                    @foreach($images as $image)
                        <div class="image grid-item">
                            <a data-toggle="lightbox" data-gallery="photos"
                               href="/storage/{{ $image->image_name}}">
                                <img src="/storage/{{ $image->image_name}}"/>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>No pictures found!</p>
                @endif
            </div>
        </div>
    </section>
    <script>
        imagesLoaded( document.querySelector('.grid'), function( instance ) {
            var elem = document.querySelector('.grid');
            var msnry = new Masonry(elem, {
                itemSelector: '.grid-item',
                gutter: 35,
                fitWidth: true,
            });
        });
    </script>
@endsection
