@extends('layouts.default', ['title' => $category->name ])
@section('content')
    @include('inc.sm-navbar')
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
            <div class="row pt-3">
                @if(!$images->isEmpty())

                    @foreach($images as $image)
                        <a href="/storage/{{ $image->image_name}}">
                            <img class="w-25" src="/storage/{{ $image->image_name}}"/>
                        </a>
                    @endforeach

                @else
                    <p>No pictures found!</p>
                @endif
            </div>
        </div>
    </section>
@endsection
