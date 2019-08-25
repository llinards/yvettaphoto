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
               <div class="col-8 mx-auto item">
                  <div class="card border-0 card-shadow">
                     <a href="gallery/">
                        <img class="card-img img-fluid img-blur" src="img/cover-photos/main_portfolio_cover.jpeg">
                     </a>
                  </div>
                  <div class="all-photos-btn text-align-center">
                     <a class="text-dark text-uppercase font-weight-bold anime-border portfolio-link pt-3" href="gallery/">see all photos</a>
                  </div>
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
                  <form method="POST" action="inc/mail.php" class="contact-form">
                     <div class="form-group">
                        <input autocomplete="nope" type="text" class="form-control input" name="name" id="" placeholder="Name">
                     </div>
                     <div class="form-group">
                        <input autocomplete="nope" type="text" class="form-control input" name="email" id="" placeholder="E-mail">
                     </div>
                     <div class="form-group">
                        <textarea autocomplete="off" class="form-control" name="msg" id="" placeholder="Type your message" rows="3"></textarea>
                     </div>
                     <button class="btn btn-submit" type="submit">Send</button>
                  </form>
               </div>
            </div>
         </div>
      </section>
      {{-- end of contact form --}}
@stop
