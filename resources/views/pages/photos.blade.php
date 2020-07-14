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
            <div class="row p-3 images-container">
                @if(!$images->isEmpty())
                    @foreach($images as $image)
                        <div class="image">
                            <a data-toggle="lightbox" class="" data-camera-model="{{ $image }}" data-footer="{{ $image }}}" data-gallery="photos"
                               href="/storage/{{ $image->image_name}}">
                                <img class="" src="/storage/{{ $image->image_name}}"/>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p>No pictures found!</p>
                @endif
            </div>
        </div>
    </section>
@endsection
