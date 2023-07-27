@extends('layouts.admin-default',['title' => 'Jauna kategorija'])
@section('content')
  <div class="container admin-container">
    @include('inc.status-messages')
    <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Izveidot jaunu kategoriju</h2>
      </div>
    </div>
    <div class="row justify-content-center m-2">
      <div class="col-10">
        <form action="/admin/kategorijas" enctype="multipart/form-data" method="post">
          @csrf
          <div class="form-group">
            <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
            @error('category-name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" value="{{ old('category-name') }}" name="category-name"
                   id="category-name" placeholder="Kategorijas nosaukums šeit">
          </div>
          <div class="form-group">
            <label for="category-description">Kategorijas apraksts</label>
            @error('category-description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" id="category-description" name="category-description"
                      rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="single-img-upload" class="col-form-label">Kategorijas titulbilde</label>
            @error('single-img-upload')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="file" class="form-control-file" name="single-img-upload" id="single-img-upload">
            <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px.</small>
            <small class="form-text text-muted"><strong>Bildes
                izmērs nedrīkst pārsniegt 1 MB (1024 KB).</strong></small>
          </div>
          <button type="submit" class="btn btn-success">Pievienot kategoriju</button>
          <a class="btn btn-secondary" href="/admin/kategorijas">Atpakaļ</a>
        </form>
      </div>
    </div>
  </div>
  @include('inc.single-img-upload')
  @include('inc.ckeditor-template')
@endsection
