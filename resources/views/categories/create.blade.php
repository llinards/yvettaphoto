@extends('layouts.admin-default',['title' => 'Jauna kategorija'])
@section('content')
@include('inc.admin-navbar')
<div class="container mt-4">
  @include('inc.status-messages')
  <div class="jumbotron">
     <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Izveidot jaunu kategoriju</h2> 
     </div>
  </div>
  <div class="row justify-content-center m-2">
    <form action="/admin/kategorijas" enctype="multipart/form-data" method="post">
      @csrf
      <div class="form-group">
        <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
        <input type="text" class="form-control" value="{{ old('category-name') }}" name="category-name" id="category-name" placeholder="Kategorijas nosaukums šeit">
        @error('category-name')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="form-group">
        <label for="category-cover" class="col-form-label">Kategorijas titulbilde</label>
        <input type="file" class="form-control-file" name="category-cover" id="category-cover">
        <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px</small>
        @error('category-cover')
          <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
        <button type="submit" class="btn btn-success">Pievienot kategoriju</button>
        <a class="btn btn-secondary" href="/admin/kategorijas">Atpakaļ</a>
    </form>
  </div>
</div>
@endsection