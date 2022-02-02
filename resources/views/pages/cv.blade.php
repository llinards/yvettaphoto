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
          <h4 class="font-weight-bold text-uppercase">Magazines</h4>
          <p class="lead main-text">ICMPHOTOMAG (ICM Photography Magazine), “Doing Environmentally”</p>
          <p class="lead main-text"><a href="https://www.icmphotomag.com/special-environmental-issue-november-2021" target="_blank">www.icmphotomag.com</a></p>
          <p class="lead main-text">LEMAG (Long Exposure Photography Magazine), Project “Senses of Kandinsky”</p>
          <p class="lead main-text"><a href=" https://indd.adobe.com/view/25d5692b-3ee2-4a5a-bd9e-3612ceefc1ea" target="_blank">indd.adobe.com</a></p>
          <hr>
          <h4 class="font-weight-bold text-uppercase">Book</h4>
          <p class="lead main-text">Group publication in “ Abstract Rhythm &Blue Notes”, 2021</p>
          <hr>
          <h4 class="font-weight-bold text-uppercase">Education</h4>
          <p class="lead main-text">Iveta studied creative technics in the workshops: of Valda Bailey (UK), Doug Chinnery (UK); ICM Photography Magazine (USA);
            Sharon Tennenbaum (Canada); Susan Burnstine (USA)</p>
          <p class="lead main-text">Photo Académie in Riga (Latvia)</p>
          <p class="lead main-text">Master's degree in Environmental Science, University of Latvia</p>
          <p class="lead main-text">Faculty of Chemistry, University of Latvia</p>
        </div>
      </div>
    </div>
  </section>
@stop
