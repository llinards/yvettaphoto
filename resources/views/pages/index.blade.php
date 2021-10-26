@extends('layouts.default')
@section('content')
  @include('inc.navbar', ['index' => true])
  {{-- header section --}}
  <section id="home"></section>
  {{-- end of header section --}}
  {{-- view portfolio section --}}
  <section id="portfolio" class="gallery-block grid-gallery">
    <div class="container-fluid">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase main-header">Portfolio</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        @foreach($categories as $category)
          <div class="col-sm-12 col-md-6 col-lg-4 p-0 category">
            <a href="/{{ $category->category_slug }}">
              <div class="category-image">
                <img class="w-100 h-100" src="/storage/{{ $category->cover_photo_url}}" alt="">
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
  {{-- end of view portfolio section --}}
  {{-- contact form --}}
  <section id="contactMe">
    <div class="container-fluid">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">Contact<br /> Me</h1>
        <div class="underline"></div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          @include('inc.status-messages')
          <form method="POST" action="/send-email" class="contact-form">
            @csrf
            @honeypot
            <div class="form-group">
              <input type="text" class="form-control input" name="name" id="" placeholder="Name"
                    value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control input" name="email" id="" placeholder="E-mail"
                    value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                            <textarea class="form-control" name="msg" id="" placeholder="Type your message" rows="3"
                                      value="{{ old('msg') }}" required></textarea>
            </div>
            <button class="btn btn-submit" type="submit">Send</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  {{-- end of contact form --}}
@stop
