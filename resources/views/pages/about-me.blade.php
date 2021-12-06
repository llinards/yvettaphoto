@extends('layouts.default', ['title' => 'About Me'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section id="about-me">
    <div class="container-fluid">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">About Me</h1>
        <div class="underline"></div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="main-text-img text-center mb-5">
              <img src="../img/iveta-lazdina-artist-statement.jpeg" width="250" class="img-fluid" alt="">
            </div>
            <p class="lead main-text">I’m
              Iveta is a Latvian-based photographer. Her interest in photography raised during traveling – how to pick up colors that surround you, expressions of
              light, and feelings of a particular moment. To become as a Photographer, Iveta started with fundamental knowledges in Photo Académie in Riga
              (Latvia) within classes of one of greatest nature master photographer in Latvia - Maris Kundzins.
            </p>
            <p class="lead main-text mb-3">
              Iveta was studied an art in creative classes of Karina Rungenfelde. The beauty of contrasts and nature lines helped her to develop an interest in
              other forms of art like photography. She is inspired by Impressionists & Abstract painter’s masterpieces and photo camera possibilities nowadays.
            </p>
            <p class="lead main-text mb-5">Iveta studied creative technics in the workshops of Valda Bailey (UK), Doug Chinnery (UK), ICM Photography Magazine
              (USA) , Sharon Tennenbaum (Canada), Susan Burnstine (USA).</p>
            <p class="lead main-text mb-3">For Iveta photography is an inner conversation about the paths of our lives and layers of emotions we pass through. The
              beauty of nature is the foundation and never-ending inspiration for Ivetas images. It is a never-ending process of learning about art and nowadays
              photo technics which characterizes Iveta very well.</p>
            <div class="main-text-img text-center mb-3">
              <img src="../img/about-me/Hannover_web_story.jpg" width="350" class="img-fluid" alt="">
            </div>
            <p class="lead main-text mb-3">Her first image for wider audience was published in the Latvian pavilion in Hannover during “Expo 2000”. It was about a
              project of waste development in the North Vidzeme region where I was involved and proud of. Today such photo wouldn’t get high attention, but in
              2000ies it was not only a significant achievement for myself to produce photo but also very significant progress in Environmental management here in
              Latvia.</p>
            <p class="lead main-text mb-5">Most recent project “Doing Environmentally” was included in ICM Photography Magazine Special Edition in relation to the
              COP26 Climate Change Conference being held in Glasgow, Scotland, November 2021. - <a
                href="https://www.icmphotomag.com/special-environmental-issue-november-2021" target="_blank">www.icmphotomag.com</a></p>
            <h3 class="text-uppercase text-center main-text">ENJOY AND BE INSPIRED BY THE PHOTOS!</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
