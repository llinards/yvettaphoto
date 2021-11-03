@extends('layouts.default', ['title' => 'About Me'])
@section('content')
    @include('inc.navbar', ['index' => false])
    <section class="py-5" id="about-me">
      <div class="container-fluid">
         <div class="heading d-flex align-items-center justify-content-around">
            <div class="underline"></div>
            <h1 class="text-uppercase text-center main-header">About Me</h1>
            <div class="underline"></div>
         </div>
         <div class="container">
            <div class="row">
               <div class="col">
                  <p class="lead main-text">I’m
                     <strong>Iveta Lazdina</strong> from Latvia. Photography for me is a conversation about what I see and how feel. It is an inner conversation about a personal experience of learning new knowledge, technology, exploring new places, and experiencing the changing circumstances of this world.
                     To become a photographer, I started with fundamental pieces of knowledge in Photo Académie in Riga (Latvia). Upon finding ICM and ME photo technics, I realized that is the language I was looking for – be able to access and express a secret and mystique of life, color tonality, and vibrance of my emotions. It is a language that reflects the way I see and feel life and the way to be in dialog with you.
                  </p>
                  <hr />
                  <div class="main-text-img text-center">
                     <img src="../img/about-me/Hannover_web_story.jpg" width="350" class="img-fluid py-2" alt="">
                  </div>
                  <p class="lead main-text">
                     My photo in "EXPO 2000" info desk in the Latvian pavilion in Hannover.
                     It was about a waste development project in the region where I was involved and proud of. Today such a photo wouldn’t get high attention, but in the 2000ies it was not only a significant achievement for me to produce a photo but also very significant progress in Environmental management here in Latvia.</p>
                  </p>
                  <hr />
                  <h3 class="text-uppercase text-center main-text">ENJOY AND BE INSPIRED BY THE PHOTOS!</h3>
               </div>
            </div>
         </div>
      </div>
   </section>
@stop
