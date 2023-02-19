@extends('layouts.default', ['title' => 'CV'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">CV</h1>
        <div class="underline"></div>
      </div>
      <div class="row">
        <div class="col cv-content">
          {!! $cv->content !!}
        </div>
      </div>
    </div>
  </section>
@stop
