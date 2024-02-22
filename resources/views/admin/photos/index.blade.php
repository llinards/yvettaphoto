<x-admin-app-layout>
  <x-slot name="header">
    <h2>Bildes kategorijā - <strong>{{$category->name}}</strong></h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-12">
      <form action="{{route('category.images.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
          <input type="hidden" name="category-id" value="{{ $category->id }}">
          <label for="multiple-img-upload" class="col-form-label">Pievieno jaunas bildes</label>
          <x-multiple-img-upload/>
          <small class="form-text text-muted"><strong>Bildes
              izmērs nedrīkst pārsniegt 1 MB (1024 KB).</strong></small>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success">Pievienot</button>
        </div>
      </form>
    </div>
    <div class="col-12 mt-5">
      <div class="gallery-images">
        @foreach($category->images as $image)
          <div class="gallery-image position-relative">
            <form action="{{route('category.images.destroy',[$image->id])}}" method="POST"
                  class="d-flex justify-content-between align-items-center">
              @csrf
              @method('DELETE')
              <button type="button" class="delete-gallery-image-icon p-0">
                <i class="fa-solid fa-circle-info"></i>
              </button>
              <button type="submit" class="delete-gallery-image-icon p-0">
                <i class="fa-solid fa-xmark"></i>
              </button>
            </form>
            <img class="img-fluid w-100 mb-3"
                 src="{{ asset('storage/uploads/'.$image->category->category_slug.'/'.$image->image_name) }}"/>
          </div>
        @endforeach
      </div>
    </div>
  </x-slot>
</x-admin-app-layout>
