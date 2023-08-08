@extends('layouts.admin-default', ['title' => 'Pievienot bildes'])
@section('content')
  <div class="container admin-container">
    <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Pievienot jaunas bildes</h2>
      </div>
    </div>
    @include('inc.status-messages')
    <div class="row justify-content-center m-2">
      <div class="col-10">
        @if(!$categories->isEmpty())
          <form action="/admin/bildes" enctype="multipart/form-data" method="post">
            @csrf
            <div class="form-group">
              <select class="custom-select" name="selected-category">
                <option selected disabled>Izvēlies kategoriju</option>
                @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <input type="file" id="multiple-img-upload" name="multiple-img-upload[]" multiple>
            </div>
            <div class="admin-buttons">
              <button type="submit" class="btn btn-success">Pievienot</button>
              <a href="/admin" class="btn btn-secondary">Atpakaļ</a>
            </div>
          </form>
        @else
          <p>Vispirms pievieno kategoriju <a href="/admin/kategorijas">šeit</a>, lai varētu pievienot bildes. :)</p>
        @endif
      </div>
    </div>
  </div>
  @include('inc.multiple-img-upload')
@stop
