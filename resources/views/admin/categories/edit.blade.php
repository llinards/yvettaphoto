<x-admin-app-layout>
  <x-slot name="header">
    <h2>Rediģēt kategoriju: <strong>{{ $category->name }}</strong></h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-lg-6 offset-lg-3 col-12">
      <form action="{{route('categories.update')}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="category-id" value="{{ $category->id }}">
        <div class="form-group">
          <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
          <input type="text" class="form-control" value="{{ $category->name }}" name="category-name"
                 id="category-name" placeholder="Kategorijas nosaukums šeit">
        </div>
        <div class="form-group">
          <label for="category-description">Kategorijas apraksts</label>
          <x-description-text-area>
            {{ $category->description }}
          </x-description-text-area>
        </div>
        <div class="row">
          <div class="form-group col-lg-6 col-12">
            <label for="">Kategorijas esošā titulbilde</label>
            <img src="{{ asset('storage/uploads/'.$category->category_slug.'/'.$category->cover_photo_url) }}"
                 class="card-img-top w-50" alt=""/>
          </div>
          <div class="form-group col-lg-6 col-12">
            <label for="single-image" class="col-form-label">Kategorijas jaunā titulbilde</label>
            <x-file-upload type="single-image"/>
          </div>
        </div>
        <div class="form-group">
          <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px.</small>
          <small class="form-text text-muted"><strong>Bildes
              izmērs nedrīkst pārsniegt 1 MB (1024 KB).</strong></small>
        </div>
        <div class="d-flex justify-content-between flex-wrap">
          <a class="btn btn-secondary" href="{{route('categories.index')}}">Atpakaļ</a>
          <button type="submit" class="btn btn-success">Atjaunot kategoriju kategoriju</button>
        </div>
      </form>
    </div>
    </div>
  </x-slot>
</x-admin-app-layout>
