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
          <p class="lead main-text">Iveta Lazdina is a fine art photographer from Latvia. Her interest in photography was raised while traveling to embed personal feelings of particular moments, moving beyond the medium's ability to reproduce reality. Iveta is inspired by abstract painters, and she works in an abstract and semi-abstract manner with ICM and multi-exposure technics. Her works are drawn to find harmony and balance between the inner and outer world.</p>
          <p class="lead main-text mb-3">She started her fundamental knowledge in photography in Photo Academie in Riga (Latvia). In addition, Iveta has studied art in several creative classes and International workshops.</p>
          <p class="lead main-text mb-3">Lazdina's images have been exhibited in several group exhibitions and published several times in ICMPhoto Magazine, LeMag online Magazine.</p>
{{--          <p class="lead main-text mb-3">Her photography has been exhibited nationally and internationally:</p>--}}
{{--          <ul>--}}
{{--            <li class="lead main-text">SE Center for Photography, Grenville, SC</li>--}}
{{--            <li class="lead main-text">Photo Place Gallery, Middlebury, VT, with Jurors AWARD  nomination</li>--}}
{{--            <li class="lead main-text">ASMITH Gallery, Johnson City, TX.</li>--}}
{{--          </ul>--}}
{{--          <p class="lead main-text mb-3">Lazdina's work has been published online in the ICMPhoto Magazine, LeMag Magazine.</p>--}}
          <div class="submit-btn pt-0 text-center mb-3">
            <button class="btn" id="read-more-bio-btn" type="button" data-toggle="collapse" data-target="#read-more-bio" aria-expanded="false"
              aria-controls="read-more-bio">
              READ MORE
            </button>
          </div>
          <div class="collapse" id="read-more-bio">
            <div class="main-text-img text-center mb-3">
              <img src="../img/about-me/Hannover_web_story.jpg" width="350" class="img-fluid" alt="">
            </div>
            <p class="lead main-text mb-5">Her first image for a wider audience was published in the Latvian pavilion in Hannover during “Expo 2000”. It was
              about
              a waste project developed in the North Vidzeme region, where Iveta was involved and proud of. Of course, today, such a photo wouldn’t get close
              attention. Still, in the 2000ies, it was a significant achievement to produce and present photos of very substantial progress in Environmental
              management here in Latvia.</p>
            <h3 class="text-uppercase text-center main-text">ENJOY AND BE INSPIRED BY THE PHOTOS!</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
