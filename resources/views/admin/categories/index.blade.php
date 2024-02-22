<x-admin-app-layout>
  <x-slot name="header">
    <h2>Kategorijas</h2>
    <a href="{{route('categories.create')}}" class="btn btn-success">Pievienot jaunu kategoriju</a>
  </x-slot>
  <x-slot name="content">
    @if(!$categories->isEmpty())
      @foreach($categories as $category)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-5">
          <form action="{{route('categories.destroy',[$category->category_slug])}}" method="POST"
                class="d-flex justify-content-between align-items-center">
            @csrf
            @method('DELETE')
            <a href="{{route('categories.edit',[$category->category_slug])}}" class="admin-action-icons p-0">
              <i class="fa-solid fa-circle-info"></i>
            </a>
            <a href="{{route('category.images.index',[$category->category_slug])}}" class="admin-action-icons p-0">
              <i class="fa-solid fa-images"></i>
            </a>
            <button type="submit" onclick="return confirm('Vai tiešām vēlies dzēst kategoriju un bildes tajā?');"
                    class="admin-action-icons p-0">
              <i class="fa-solid fa-xmark"></i>
            </button>
          </form>
          <img class="w-100"
               src="{{ asset('storage/uploads/'.$category->category_slug.'/'.$category->cover_photo_url) }}">
          <hr>
          <h5 class="text-center">{{ $category->name }}</h5>
        </div>
      @endforeach
    @else
      <div class="text-center w-100 mt-5">
        <p>Nav nevienas kategorijas! Pievieno, lai kaut ko redzētu šeit! :)</p>
      </div>
    @endif
  </x-slot>
</x-admin-app-layout>
