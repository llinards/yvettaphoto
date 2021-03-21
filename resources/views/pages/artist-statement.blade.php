@extends('layouts.default', ['title' => 'Artist Statement'])
@section('content')
    @include('inc.navbar', ['index' => false])
    <section class="py-5" id="about-me">
      <div class="container-fluid">
          <div class="row mt-5 justify-content-center">
            <div class="heading">
              <h1 class="display-4 text-uppercase text-center main__headings">The Artist Statement</h1>
              <div class="underline"></div>
            </div>
          </div>
          <div class="container">
            <div class="row text-center mt-5">
              <div class="col">
                <img src="../img/iveta-lazdina-artist-statement.jpeg" width="350" class="img-fluid pb-3" alt="">
                <p class="lead text-justify about-me__p">For me, photography is a conversation about what I see and feel, what I would like to say being surrounded by nature colors, and expressions of light. It is a conversation within time through centuries getting inspired by Impressionists & Abstract painter’s masterpieces and photo camera possibilities nowadays. Sometimes this is the inner conversation about my paths and what I see on this. It is a never-ending process of learning.</p>
                <p class="lead text-justify about-me__p">While taking photos I ask myself how to pick up the magic of the moment I feel when the sunlight catches this particular tree or flower? Upon finding ICM and ME photo technics, I realized that this is the language I was looking for – being able to access a secret and mystique, color vibrance, and movements of shape. It is a language that reflects the way I see the world, feel life, and want to show it to others. Life is so colorful, and the surroundings tell so many stories which I would like to pass on to others by layering images, using multi-exposure and various camera movements.</p>
              </div>
            </div>
          </div>
      </div>
  </section>
@stop
