@extends('layouts.default', ['title' => 'Purchase'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">Prints</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        <div class="col">
          <div class="main-text-img text-center mb-5">
            <img src="../img/purchase.jpg" width="250" class="img-fluid" alt="">
          </div>
          <p class="lead main-text">All images are printed at 11 x 14 and 16 x 20 inches paper size. Printed on archival
            signature Fine Art Inkjet paper (Fotospeed, Hahnemulle or similar).
            Unframed.</p>
          <p class="lead main-text">Prints are in limited edition of 15.
            Some images done in encaustic in edition of 5. For encaustic  images please ask in advance (not al images
            available for encaustic)</p>
          <p class="lead main-text">Prints are signed and numbered in pencil au verso.
            Available for the international shipping.</p>
          <p class="lead main-text">For inquiries and availability of images please contact me <a href="mailto:info@yvettaphoto.com">here</a>.</p>
        </div>
      </div>
    </div>
  </section>
@stop
