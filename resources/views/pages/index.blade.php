@extends('layouts.default')
@section('content')
   @include('inc.navbar')
      {{-- header section --}}
      <section id="first"></section>
      {{-- end of header section --}}
      {{-- view portfolio section --}}
      <section id="second" class="gallery-block grid-gallery">
         <div class="container">
            <div class="heading">
               <h1 class="display-4 text-uppercase main__headings">Portfolio</h1>
               <div class="underline"></div>
            </div>
            <div class="row justify-content-center">
               <div class="col-sm-12 col-lg-8 mx-auto gallery-photo">
                  <a href="/gallery/">
                     <h3 class="gallery-photo-title text-uppercase text-white p-1">see all photos</h3>
                     <img class="img-fluid" src="img/cover-photos/main_portfolio_cover.jpeg" alt="">     
                  </a>    
               </div>
            </div>
         </div>
      </section>
      {{-- end of view portfolio section --}}
      {{-- view about me section --}}
      <section id="third">
         <div class="container">
            <div class="row justify-content-center align-items-center">
               <div class="heading">
                  <h1 class="display-4 text-uppercase text-center text-white main__headings">About Me</h1>
                  <div class="underline-dark"></div>
               </div>
               <div class="row about-me__container">
                  <div class="col">
                     <p class="lead text-light">
                        You are warmly welcome on my photo webpage! I hope you will enjoy beautiful landscapes and creative multi-exposures as I
                        firmly believe we have to share our expertise from beautiful places until magic blink snapshots
                        to make our life much better and more beautiful.
                     </p>
                     <p class="lead text-light">
                        Feel free to read about my journey more
                        <a class="text-light font-weight-bold anime-border-white about-me__read-more" href="about-me/">here...</a>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      {{-- end of view about me section --}}
      {{-- contact form --}}
      <section id="fourth">
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
                     <div class="form-group">
                        <input type="text" class="form-control input" name="name" id="" placeholder="Name" value="{{ old('name') }}" required>
                     </div>
                     <div class="form-group">
                        <input type="email" class="form-control input" name="email" id="" placeholder="E-mail" value="{{ old('email') }}" required>
                     </div>
                     <div class="form-group">
                        <textarea class="form-control" name="msg" id="" placeholder="Type your message" rows="3" value="{{ old('msg') }}" required></textarea>
                     </div>
                     <button class="btn btn-submit" type="submit">Send</button>
                  </form>
               </div>
            </div>
         </div>
      </section>
      {{-- end of contact form --}}
@stop
