@extends('layouts.admin-default',['title' => 'Rediģēt ziņu'])
@section('content')
  <div class="container admin-container">
    <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Izveidot jaunu ziņu</h2>
      </div>
    </div>
    @include('inc.status-messages')
    <div class="row justify-content-center m-2">
      <form action="/admin/zinas" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <input type="text" style="display: none;" name="id" value="{{ $news->id }}">
        <div class="form-group">
          <label for="news-title" class="col-form-label">Ziņas virsraksts</label>
          <input type="text" class="form-control" value="{{ $news->title }}" name="news-title"
                 id="news-title" placeholder="Virsraksts">
        </div>
        <div class="form-group">
          <label for="news-description">Ziņas saturs</label>
          <textarea class="form-control" id="description-textarea" name="news-description"
                    rows="3">{{ $news->description }}</textarea>
        </div>
        <small class="form-text text-muted"><strong>Bildēm ir jābūt maksimāli mazākā izmērā. Ieteicams izmantot 1 vai 2
            bildes.</strong></small>
        <div class="form-group">
          <input type="file" id="multiple-img-upload" name="multiple-img-upload[]" multiple>
        </div>
        <button type="submit" class="btn btn-success">Atjaunot ziņu</button>
        <a class="btn btn-secondary" href="/admin">Atpakaļ</a>
      </form>
    </div>
  </div>
  @include('inc.multiple-img-upload')
  @include('inc.ckeditor-template')
@endsection
