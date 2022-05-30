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
          <p class="lead main-text">Photography, for me, is an inner conversation – how to balance my inner turmoil of thoughts and emotions. It is a process of questions and answers. The balance of duality in nature– light and darkness, happiness and pain, symmetry, and chaos, offers order in disorder and carries beyond surface value. These contrasts reflect the inner harmony of creation. For years I have been learning to accept them in my life. Nature gives us solace and centering in both – when we celebrate and rebirth after losses.</p>
          <p class="lead main-text">Through multi-exposure and ICM (Intentional camera movement) photographic technics, I am looking to embed these varied layers of internal emotional, and external contrasts reflected in colors and shapes as a symbol of creative processes. To catch a moment, which gives you a fragment of what might be an answer or at times provides an instant of truth, is nature's greatest gift.</p>
        </div>
      </div>
    </div>
  </section>
@stop
