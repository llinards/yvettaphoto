@extends('layouts.default', ['title' => 'Portfolio'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section id="contactMe">
    <div class="container-fluid">
      <div class="heading d-flex align-items-center justify-content-around">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">Contact<br /> Me</h1>
        <div class="underline"></div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          @include('inc.status-messages')
          <form method="POST" action="/send-email" autocomplete="off" class="contact-form">
            @csrf
            @honeypot
            <div class="form-group">
              <input type="text" class="form-control input" name="name" id="" placeholder="NAME" value="{{ old('name') }}" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control input" name="email" id="" placeholder="EMAIL" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="msg" id="" placeholder="YOUR MESSAGE" rows="2" value="{{ old('msg') }}" required></textarea>
            </div>
            <div class="submit-btn d-flex justify-content-center">
              <button class="btn btn-submit" type="submit">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
