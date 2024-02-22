<x-admin-app-layout>
  <x-slot name="header">
    <h2>Kategorijas</h2>
    <a href="{{route('categories.create')}}" class="btn btn-success">Pievienot jaunu kategoriju</a>
  </x-slot>
  <x-slot name="content">
    @if(!$categories->isEmpty())
      @foreach($categories as $category)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-5">
          <h5 class="text-center">{{ $category->name }}</h5>
          <hr>
          <div class="text-center">
            <img class="w-75"
                 src="{{ asset('storage/uploads/'.$category->category_slug.'/'.$category->cover_photo_url) }}">
          </div>
          <div class="text-center">
            <a class="btn btn-secondary mt-1"
               href="{{route('categories.edit',[$category->category_slug])}}">Rediģēt
              kategoriju</a>
            <a class="btn btn-secondary mt-1" href="/admin/{{ $category->category_slug }}/bildes">Bildes šajā
              kategorijā</a>
            <hr>
            <form action="{{route('categories.destroy',[$category->category_slug])}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger mt-1"
                      onclick="return confirm('Vai tiešām vēlies dzēst kategoriju un bildes tur?');">
                Dzēst kategoriju
              </button>
            </form>
          </div>
        </div>
      @endforeach
    @else
      <div class="text-center w-100 mt-5">
        <p>Nav nevienas kategorijas! Pievieno, lai kaut ko redzētu šeit! :)</p>
      </div>
    @endif
  </x-slot>
</x-admin-app-layout>
