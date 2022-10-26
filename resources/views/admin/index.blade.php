@extends('layouts.admin-default',['title' => 'Administrācijas panelis'])
@section('content')
  <section class="options">
    <div class="container admin-container">
      @include('inc.status-messages')
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
      <div class="container admin-container">
        <div class="news-section-heading text-center">
          <h2 class="admin__headings">Ziņas/jaunumi</h2>
        </div>
        <div class="news-section-add-new mb-2 text-center">
          <a href="/admin/zinas/new" class="btn btn-success">Pievienot jaunu ziņu</a>
        </div>
          <div class="news-section-content">
            <div class="row justify-content-center">
            @foreach($allNews as $newsItem)
              <div class="col-3 m-2">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">{{ $newsItem->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Izveidots: {{ $newsItem->created_at }}</h6>
                    <h6 class="card-subtitle mb-2 text-muted">Rediģēts: {{ $newsItem->updated_at }}</h6>
                    <a href="/admin/zinas/{{$newsItem->id}}/edit" class="card-link">Rediģēt</a>
                    <a href="#" class="card-link btn btn-danger">Dzēst</a>
                  </div>
                </div>
              </div>
            @endforeach
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection
