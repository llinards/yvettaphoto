@extends('layouts.default', ['title' => 'BIO'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">BIO</h1>
        <div class="underline"></div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="main-text-img text-center mb-5">
              <img src="../img/iveta-lazdina-artist-statement.jpeg" width="250" class="img-fluid" alt="">
            </div>
            <p class="lead main-text">Iveta is a Latvian-based photographer. Her interest in photography was raised during traveling – how to pick up colors that
              surround you, expressions of light, and feelings of a particular moment. To become a Photographer, Iveta started with fundamental knowledge in Photo
              Académie in Riga (Latvia) within classes of one of the most excellent nature master photographers in Latvia - Maris Kundzins.
            </p>
            <p class="lead main-text mb-3">
              Iveta has studied art in the creative classes of Karina Rungenfelde. The beauty of contrasts and nature lines helped her develop an interest in
              other art forms like photography. She is inspired by Impressionists & Abstract painter’s masterpieces and photo camera possibilities nowadays. It is
              a never-ending process of learning which characterizes Iveta very well.
            </p>
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
              <p class="lead main-text mb-3">The most recent project, “Doing Environmentally,” was included in ICM Photography Magazine Special Edition concerning
                the COP26 Climate Change Conference being held in Glasgow, Scotland, November 2021. - <a
                  href="https://www.icmphotomag.com/special-environmental-issue-november-2021" target="_blank">www.icmphotomag.com</a></p>
              <h3 class="text-uppercase text-center main-text">ENJOY AND BE INSPIRED BY THE PHOTOS!</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop