@extends('layouts.default', ['title' => 'News'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">news</h1>
        <div class="underline"></div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col">
            <p class="lead main-text">The photo “Wild” has been selected by juror, Susan Burnstine.  It will be included in the exhibition “All About the Light” at The SE Center for Photography.</p>
            <p class="lead main-text"><a href="https://www.sec4p.com/new-index" target="_blank">www.sec4p.com</a></p>
            <p class="lead main-text">To visit full project “Spring” please visit <a href="https://yvettaphoto.com/portfolio">portfolio</a>.</p>
            <p class="lead main-text">All About the Light will open Friday, March 4, and remain open through March.</p>
            <div class="text-center mt-5">
              <img src="../img/news/wild.jpg" width="350" class="img-fluid" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@stop
