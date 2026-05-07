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
          <p class="lead main-text">Photography, for me, is a way of exploring the relationship between perception and
            emotional experience. My work moves between figuration and abstraction, shaped by an interest in how memory,
            sensation, and atmosphere influence the way we recognize the world around us. I am drawn to moments where
            familiarity begins to dissolve — where landscapes, light, and form shift beyond direct description into
            something more intuitive and emotionally felt.</p>
          <p class="lead main-text">Working with layered imagery, camera movement, and multi-exposure processes, I
            create photographs that resist fixed interpretation. Rather than documenting external reality, the images
            reflect fleeting states of recognition, presence, and emotional ambiguity.</p>
          <p class="lead main-text">Nature appears throughout the work not simply as subject matter, but as a place
            where emotional and perceptual experiences become intertwined.</p>
          <p class="lead main-text">I am interested in photography’s ability to move beyond representation toward
            something more sensory, personal, and unresolved.</p>
        </div>
      </div>
    </div>
  </section>
@stop
