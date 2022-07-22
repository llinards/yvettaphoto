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
        <div class="col">
          <h4 class="font-weight-bold text-uppercase">GROUP EXBIBITIONS</h4>
          <p class="lead main-text">“Trees” in ASMITH GALLERY photographic arts, Johnson City, Texas, US, 2022</p>
          <p class="lead main-text">“Work of earth” show at the WithINSight Gallery, Chicago, US, 2022</p>
          <p class="lead main-text">“Dreams and Imaginings” in Photo Place Gallery, Middlebury, Vermont, US, 2022, with JUROR’S AWARD to the photograph “Let’s go lost”</p>
          <p class="lead main-text">“It’s All About the Light” in SE Center for Photography Gallery, Greenville, South Carolina, US, 2022</p>
          <hr>
          <h4 class="font-weight-bold text-uppercase">Magazines</h4>
          <p class="lead main-text">“Strokes of Time square”, ICMPHOTOMAG (ICM Photography Magazine), 2022</p>
          <p class="lead main-text"><a href="https://www.icmphotomag.com/march-2022-issue" target="_blank">www.icmphotomag.com</a></p>
          <p class="lead main-text">“Doing environmentally”, ICMPHOTOMAG (ICM Photography Magazine), 2021</p>
          <p class="lead main-text"><a href="https://www.icmphotomag.com/special-environmental-issue-november-2021" target="_blank">www.icmphotomag.com</a></p>
          <p class="lead main-text">“Senses of Kandinsky”, LEMAG (Long Exposure Photography Magazine), 2021</p>
          <p class="lead main-text"><a href=" https://indd.adobe.com/view/25d5692b-3ee2-4a5a-bd9e-3612ceefc1ea" target="_blank">indd.adobe.com</a></p>
          <hr>
          <h4 class="font-weight-bold text-uppercase">Book</h4>
          <p class="lead main-text">Group book “Abstract Rhythm & Blue Notes”, 2021</p>
{{--          <hr>--}}
{{--          <h4 class="font-weight-bold text-uppercase">Education</h4>--}}
{{--          <p class="lead main-text">Iveta has studied different creative technics in the UK, USA, Canada.</p>--}}
{{--          <p class="lead main-text">Photo Académie in Riga (Latvia)</p>--}}
{{--          <p class="lead main-text">Master's degree in Environmental Science, University of Latvia</p>--}}
{{--          <p class="lead main-text">Faculty of Chemistry, University of Latvia</p>--}}
        </div>
      </div>
    </div>
  </section>
@stop
