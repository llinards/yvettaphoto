@extends('layouts.default')
@section('content')
  @include('inc.navbar', ['index' => true])
  {{-- header section --}}
  <section id="home"></section>
  {{-- end of header section --}}
  {{-- view portfolio section --}}
  <section id="portfolio" class="gallery-block grid-gallery">
    <div class="container-fluid">
      <div class="heading">
        <h1 class="display-4 text-uppercase main__headings">Portfolio</h1>
        <div class="underline"></div>
      </div>
      <div class="row pt-3">
        @foreach($categories as $category)
          <div class="col-sm-12 col-md-6 col-lg-3 p-1 gallery-photo">
            <a href="/{{ $category->category_slug }}">
              <h5 class="gallery-photo-title text-uppercase text-white p-1">{{ $category->name }}</h5>
              <img class="img-fluid" src="/storage/{{ $category->cover_photo_url}}" alt="">
            </a>
          </div>
        @endforeach
      </div>

    </div>
  </section>
  {{-- end of view portfolio section --}}
  {{-- view about me section --}}
  <section id="aboutMe">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="heading">
          <h1 class="display-4 text-uppercase text-center text-white main__headings">About Me</h1>
          <div class="underline-dark"></div>
        </div>
        <div class="row about-me__container">
          <div class="col">
            <p class="lead text-light">
              You are warmly welcome on my webpage! I hope you will enjoy beautiful landscapes and creative inspiration as I firmly believe we have to share our expertise from well-known beautiful places upon colorful secrets of nature and lights surrounded by.
            </p>
            <p class="lead text-light">
            
            </p>
            <p class="lead text-light">
              <a class="text-light font-weight-bold anime-border-white about-me__read-more text-uppercase" href="about-me/">Read more</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- end of view about me section --}}
  {{-- contact form --}}
  <section id="contactMe">
    <div class="container">
      <div class="row justify-content-center">
        <div class="heading">
          <h1 class="display-4 text-uppercase text-center main__headings">Contact Me</h1>
          <div class="underline"></div>
        </div>
        <div class="col-lg-12">
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
