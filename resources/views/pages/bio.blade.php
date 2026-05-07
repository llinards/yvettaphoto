@extends('layouts.default', ['title' => 'BIO'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">BIO</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        <div class="col">
          <div class="main-text-img text-center mb-5">
            <img src="../img/iveta-lazdina-artist-statement.jpeg" width="250" class="img-fluid" alt="">
          </div>
          <p class="lead main-text">Iveta Lazdina is a fine art photographer from Latvia working between figuration and
            abstraction. Her photographic practice explores perception through images that move beyond the medium’s
            descriptive function toward perceptual experience — visual environments where clarity dissolves and feeling
            takes precedence.</p>
          <p class="lead main-text mb-3">Through layered imagery and shifting visual forms, Lazdina explores atmospheres
            shaped by memory, sensation, and emotional ambiguity.</p>
          <p class="lead main-text mb-3">She studied at the Photo Academy in Riga and has further developed her practice
            through international workshops and mentorships.</p>
          <p class="lead main-text mb-3">Her work has been featured in Lenscratch, ICM Photo Magazine, LeMag, and Dodho,
            and exhibited in group exhibitions internationally across the USA and Europe.</p>
          <div class="submit-btn pt-0 text-center mb-3">
            <button class="btn" id="read-more-bio-btn" type="button" data-toggle="collapse" data-target="#read-more-bio"
                    aria-expanded="false"
                    aria-controls="read-more-bio">
              READ MORE
            </button>
          </div>
          <div class="collapse" id="read-more-bio">
            <div class="main-text-img text-center mb-3">
              <img src="../img/about-me/Hannover_web_story.jpg" width="350" class="img-fluid" alt="">
            </div>
            <p class="lead main-text mb-5">Her first photograph presented to a wider audience appeared at the Latvian
              Pavilion during Expo 2000 in Hannover. The image reflected an early interest in environmental change and
              responsibility, aligning with a period of growing ecological awareness within Latvia’s cultural landscape.
              This early public presentation became an important point of departure in the development of her
              photographic practice.</p>
            <h3 class="text-uppercase text-center main-text">ENJOY AND BE INSPIRED BY THE PHOTOS!</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
