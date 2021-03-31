@extends('layouts.default', ['title' => 'About Me'])
@section('content')
    @include('inc.navbar', ['index' => false])
    <section class="py-5" id="about-me">
      <div class="container-fluid">
         <div class="row mt-md-5 justify-content-center">
            <div class="heading">
               <h1 class="display-4 text-uppercase text-center main__headings">About Me</h1>
               <div class="underline"></div>
            </div>
         </div>
         <div class="container">
            <div class="row text-center mt-5">
               <div class="col">
                  <p class="lead text-justify about-me__p">I’m
                     <strong>Iveta Lazdina</strong> from Latvia. My way till moment to go to show photos for you is not only
                          just an overview but a quite exciting story with some thriller elements and painful moments.
                  </p>
                  <img src="../img/about-me/Me_as_model.jpg" width="350" class="img-fluid py-2" alt="">
                  <h4 class="text-uppercase border-bottom pb-2">Me as model</h4>
                  <p class="lead text-justify about-me__p">My first introduction with photo comes from early child age when I was a top model for my relatives.
                     As it is very often also today, I was interested and ready to support my uncle who did a lot
                     of black & white film photos with me as the main model. Therefore, I am lucky because of that
                     I have adorable albums from my sunshine childhood age. Even photos are black & white, I still
                     can feel a touch of the sun coming from pictures. Sometimes I also had a chance to be in the
                     darkroom where all the processes happen and where all images taken by camera turned in to the
                     photography, and it was even bigger magic for me.
                  </p>
                  <h4 class="text-uppercase border-bottom pb-2 pt-2">First KODAK</h4>
                  <p class="lead text-justify about-me__p">An essential step for me was the first KODAK semi-auto camera in 90ties. It was a period when I started
                     to photo my children – son and daughter but not only.
                  </p>
                  <img src="../img/about-me/Hannover_web_story.jpg" width="350" class="img-fluid py-2" alt="">
                  <p class="lead text-justify about-me__p">I will never forget this first camera! The picture taken by this camera was included in "EXPO 2000"
                     info desk in the Latvian pavilion in Hannover. It was about a project of waste development in
                     the region where I was involved and proud of. Today such photo wouldn’t get high attention, but
                     in 2000ies it was not only a significant achievement for myself but also very significant progress
                     in Environmental management here in Latvia. I think this was the most viewed photo so far, but
                     I hope to change this statistic with new projects very soon!
                  </p>
                  <h4 class="text-uppercase border-bottom pb-2 pt-2">Some thriller elements</h4>
                  <p class="lead text-justify about-me__p">Now it's time for some thriller elements with my DSLR cameras. My first Sony DSLR remained on the
                     Mediterranean Sea where I accidentally slipped on the stones… (but I managed to keep memory card
                     :) ) Next Nikon was stolen… but finally the next Nikon started to bring me fantastic photos.
                  </p>
                  <h4 class="text-uppercase border-bottom pb-2 pt-2">Learning</h4>
                  <p class="lead text-justify about-me__p">To start to master my camera, apply some light edits and get pictures as wish, I graduated Photo
                     Academia in Riga with the most excellent tutor in the world Maris Kundzins (Latvia). It was a
                     process which completely changed my understanding of photography starting from my vision, who
                     is doing what in the process of photography, feeling of colour, composition till technical basics
                     and tips and finally philosophy behind each photo.
                     <p class="lead text-justify about-me__p">
                        You see my experience is not very easy, but I am confident we all have to pass some learnings to achieve some results!</p>
                     <p class="lead text-justify about-me__p">I hope and wish you to enjoy photo!</p>
                     <blockquote class="text-uppercase about-me__quote about-me__p">Get inspired to pick up beautiful moments
                     <br>with you!</blockquote>
                  </p>
                  <img src="../img/about-me/0338_1200px.jpg" width="350" class="img-fluid py-2" alt="">
               </div>
            </div>
         </div>
      </div>
   </section>
@stop
