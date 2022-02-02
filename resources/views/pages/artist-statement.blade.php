@extends('layouts.default', ['title' => 'Artist Statement'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">The Artist Statement</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        <div class="col">
          <p class="lead main-text">Photography, for me, is an inner conversation. It is a process of questions and answers to myself and you. The beauty and
            diversity of nature are the foundation for dualities; light colors and darkness, smooth lines versus sharp. These contrasts reflect the inner
            harmony of creation.</p>
          <p class="lead main-text">Through the use of multi-exposure and ICM (Intentional camera movement), I am looking to embed these varied layers of
            internal and external contrasts reflected in colors and shapes as a symbol of the creative processes. To catch the moment, which gives you a
            fragment of what might be an answer or at times provides an instant of truth, is the greatest gift of nature.</p>
        </div>
      </div>
    </div>
  </section>
@stop
