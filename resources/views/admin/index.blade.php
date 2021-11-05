@extends('layouts.admin-default',['title' => 'Administrācijas panelis'])
@section('content')
  <section class="options">
    <div class="container admin-container">
      <div class="jumbotron">
        <div class="row d-flex flex-column align-items-center">
          <div>
            <h2 class="admin__headings">Kādas opcijas gribi veikt?</h2>
          </div>
          <div class="admin-buttons">
            <a href="/admin/titulbilde/jauna" class="btn btn-primary">Mainīt titulbildi</a>
            <a href="/admin/kategorijas" class="btn btn-primary">Kategoriju rediģēšana</a>
            <a href="/admin/bildes/jaunas" class="btn btn-primary">Pievienot jaunas bildes</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
