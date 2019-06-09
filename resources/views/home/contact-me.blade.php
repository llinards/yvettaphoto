@section('contact-me')
<section id="fourth">
  <div class="container">
      <div class="row justify-content-center">
          <div class="heading">
              <h1 class="display-4 text-uppercase text-center main__headings">Contact Me</h1>
              <div class="underline"></div>
          </div>
          <div class="col-lg-12">
              <form method="POST" action="inc/mail.php" class="contact-form">
                  <div class="form-group">
                      <input autocomplete="nope" type="text" class="form-control input" name="name" id="" placeholder="Name">
                  </div>
                  <div class="form-group">
                      <input autocomplete="nope" type="text" class="form-control input" name="email" id="" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                      <textarea autocomplete="off" class="form-control" name="msg" id="" placeholder="Type your message" rows="3"></textarea>
                  </div>
                  <button class="btn btn-submit" type="submit">Send</button>
              </form>
          </div>
      </div>
  </div>
</section>
@endsection