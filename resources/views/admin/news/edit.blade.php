<x-admin-app-layout>
  <x-slot name="header">
    <h2>Rediģēt aktualitāti: <strong>{{ $news->title }}</strong></h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-lg-6 offset-lg-3 col-12">
      <form action="{{route('news.update')}}" enctype="multipart/form-data" id="update-news" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="news-id" value="{{ $news->id }}">
        <div class="form-group">
          <label for="news-title" class="col-form-label">Virsraksts</label>
          <input type="text" class="form-control" value="{{ $news->title }}" name="news-title"
                 id="news-title">
        </div>
        <div class="form-group">
          <label for="description-textarea">Saturs</label>
          <x-description-text-area>
            {{ $news->description }}
          </x-description-text-area>
        </div>
        <div class="form-group">
          <label for="multiple-images" class="col-form-label">Bildes</label>
          <x-file-upload type="multiple-images"/>
        </div>
        <div class="form-group">
          <small class="form-text text-muted"><strong>Bildēm ir jābūt maksimāli mazākā izmērā. Ieteicams izmantot 1
              vai
              2
              bildes.</strong></small>
        </div>
      </form>
      <div class="news-images">
        @foreach($news->images as $image)
          <div class="news-image">
            <form action="{{route('news.image.destroy',[$image->id])}}" method="POST"
                  class="d-flex justify-content-between align-items-center"
                  id="delete-news-image-{{$image->id}}">
              @csrf
              @method('DELETE')
              <div class="form-group">
                <button type="submit" form="delete-news-image-{{$image->id}}"
                        class="admin-action-icons p-0">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
                <img src="{{ asset('storage/uploads/news/'.$image->image_location) }}"
                     class="img-fluid w-100 mb-3" alt=""/>
              </div>
            </form>
          </div>
        @endforeach
      </div>
      <div class="d-flex justify-content-between flex-wrap">
        <a class="btn btn-secondary" href="{{route('news.index')}}">Atpakaļ</a>
        <button type="submit" form="update-news" class="btn btn-success">Atjaunot aktualitāti</button>
      </div>
    </div>
  </x-slot>
</x-admin-app-layout>

