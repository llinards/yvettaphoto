@extends('layouts.admin-default')
@section('content')
@include('admin.navbar')
<div class="container pb-4 pt-4">
   <h1>Jauna kategorijas izveide</h1>
   @yield('content')
   <form action="/admin/kategorijas/{{ $category->id }}" enctype="multipart/form-data" method="post">
   @csrf
   @method('PATCH')
      <div class="form-group">
         <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
         <input id="category-name" name="category-name" type="text" class="form-control @error('category-name') is-invalid @enderror" value="{{ old('category-name') ?? $category->name }}">
         @error('category-name')
            <strong>Kategorijas nosaukums ir obligāts!</strong>
         @enderror
      </div>
      <div class="form-group">
         <label for="category-cover" class="col-form-label">Kategorijas titulbilde</label>
         <input type="file" class="form-control-file" name="category-cover" id="category-cover">
         <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px</small>
         @error('category-cover')
            <strong>{{ $message }}</strong>
         @enderror
      </div>
      <a href="/admin/kategorijas" class="btn btn-primary">Atpakaļ</a>
      <button type="submit" class="btn btn-success">Pievienot</button>
   </form>
</div>
@stop