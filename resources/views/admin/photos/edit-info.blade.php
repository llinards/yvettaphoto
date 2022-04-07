@extends('layouts.admin-default')
@section('content')
  <div class="container admin-container">
    @include('inc.status-messages')
    <div class="row justify-content-center m-2">
      <div class="card" style="width: 18rem;">
        <img src="/storage/{{$image->image_name}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h4>Kamera:</h4>
          <p>{{$image->camera_make}}</p>
          <p>{{$image->camera_model}}</p>
          <h4>Iestatījumi:</h4>
          <p>ISO: {{$image->iso}}</p>
          <p>ƒ: {{$image->f_number}}</p>
          <p>Exposure time: {{$image->exposure_time}}</p>
          <h4>Bildes "alt" vērtība:</h4>
          <form action="/admin/{{$category->category_slug}}/bildes/{{$image->id}}" class="mb-2"
                enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
              <input type="text" class="form-control" value="{{ $image->alt_attribute }}" name="image_alt_attribute"
                     id="image_alt_attribute">
              @error('image_alt_attribute')
              <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-success">Saglabāt</button>
            <a class="btn btn-secondary" href="{{ url()->previous() }}">Atpakaļ</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
