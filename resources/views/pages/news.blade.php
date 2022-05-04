@extends('layouts.default', ['title' => 'News'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">news</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        <div class="col">
          <p class="lead main-text">I am so happy to be selected with my image “Contradictions” for the online
            exhibition “Trees” in ASMITH GALLERY photographic arts, Johnson City, Texas.</p>
          <p class="lead main-text"><a href="https://asmithgallery.com/current-exhibition/" target="_blank">asmithgallery.com</a></p>
          <p class="lead main-text">The image ”Contradictions” has been included in the book “The 27”.</p>
          <div class="text-center mb-5 mt-5">
            <img src="../img/news/contradictions.jpg" width="350" class="img-fluid" alt="">
          </div>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <p class="lead main-text">I am honored that two of my images have been selected for “Dreams and Imaginings”
            exhibition in our Middlebury, Vermont gallery.
            The photograph “Let’s Go Lost” received Juror’s Susan Burnstine AWARD.</p>
          <p class="lead main-text"><a href="https://photoplacegallery.com/" target="_blank">photoplacegallery.com</a>
          </p>
          <p class="lead main-text">The photograph “Let’s Go Lost” is included in the Gallery exhibition.</p>
          <div class="text-center mt-3 mb-3">
            <img src="../img/news/lets-go-lost.jpg" width="350" class="img-fluid" alt="">
          </div>
          <p class="lead main-text mb-5">To see the entire project “Strokes of Time Square” please visit the <a
              href="https://yvettaphoto.com/portfolio/strokes-of-time-square">portfolio</a>.</p>
          <p class="lead main-text">The photograph “Over-crossing” is included in the online exhibition.</p>
          <div class="text-center mt-3 mb-3">
            <img src="../img/news/over-crossing.jpg" width="350" class="img-fluid" alt="">
          </div>
          <p class="lead main-text mb-5">To see the entire project “Abstract Street Photographs” please visit the <a
              href="https://yvettaphoto.com/portfolio/abstract-street-photographs">portfolio</a>.</p>
          <p class="lead main-text">The exhibition “Dreams and Imaginings “ will open Thursday, April 28, and remain
            open through May.</p>
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">
          <p class="lead main-text">The photo “Wild” has been selected by juror, Susan Burnstine. It will be included
            in the exhibition “All About the Light” at
            The SE Center for Photography.</p>
          <p class="lead main-text"><a href="https://www.sec4p.com/new-index" target="_blank">www.sec4p.com</a></p>
          <p class="lead main-text">To visit full project “Spring” please visit <a
              href="https://yvettaphoto.com/portfolio/spring">portfolio</a>.</p>
          <p class="lead main-text">All About the Light will open Friday, March 4, and remain open through March.</p>
          <div class="text-center mt-5">
            <img src="../img/news/wild.jpg" width="350" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
