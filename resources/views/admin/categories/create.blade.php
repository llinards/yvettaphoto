<x-admin-app-layout>
  <x-slot name="header">
    <h2>Izveidot jaunu kategoriju</h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-lg-6 offset-lg-3 col-12">
      <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
          <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
          <input type="text" class="form-control" value="{{ old('category-name') }}" name="category-name"
                 id="category-name" placeholder="Kategorijas nosaukums šeit">
        </div>
        <div class="form-group">
          <label for="category-description">Kategorijas apraksts</label>
          <x-description-text-area/>
        </div>
        <div class="form-group">
          <label for="single-image" class="col-form-label">Kategorijas titulbilde</label>
          <x-file-upload type="single-image"/>
          <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px.</small>
          <small class="form-text text-muted"><strong>Bildes
              izmērs nedrīkst pārsniegt 1 MB (1024 KB).</strong></small>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-secondary" href="{{route('categories.index')}}">Atpakaļ</a>
          <button type="submit" class="btn btn-success">Pievienot kategoriju</button>
        </div>
      </form>
    </div>
  </x-slot>
</x-admin-app-layout>
