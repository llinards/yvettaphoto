<x-admin-app-layout>
  <x-slot name="header">
    <h2>Aktualitātes</h2>
    <a href="{{route('news.create')}}" class="btn btn-success">Pievienot jaunu aktualitāti</a>
  </x-slot>
  <x-slot name="content">
    @if(!$allNews->isEmpty())
      @foreach($allNews as $news)
        <div class="col-sm-6 col-md-4 col-lg-3 mt-5">
          <form action="{{route('news.destroy',[$news->id])}}" method="POST"
                class="d-flex justify-content-between align-items-center">
            @csrf
            @method('DELETE')
            <a href="{{route('news.edit',[$news->id])}}" class="admin-action-icons p-0">
              <i class="fa-solid fa-circle-info"></i>
            </a>
            <button type="submit" onclick="return confirm('Vai tiešām vēlies dzēst aktualitāti un bildes tajā?');"
                    class="admin-action-icons p-0">
              <i class="fa-solid fa-trash-can"></i>
            </button>
          </form>
          <hr>
          <h5 class="text-center">{{ $news->title }}</h5>
        </div>
      @endforeach
    @else
      <div class="text-center w-100 mt-5">
        <p>Nav nevienas aktualitātes! Pievieno, lai kaut ko redzētu šeit! :)</p>
      </div>
    @endif
  </x-slot>
</x-admin-app-layout>
