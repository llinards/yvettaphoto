<x-admin-app-layout>
  <x-slot name="content">
    <div class="col-lg-4 offset-lg-4 col-12 d-flex flex-column flex-wrap">
      <a class="m-2 btn btn-info" href="{{route('admin.cover_photo.create')}}">Mainīt titulbildi</a>
      <a class="m-2 btn btn-info" href="{{route('categories.index')}}">Kategorijas</a>
      <a class="m-2 btn btn-info" href="{{route('news.index')}}">Aktualitātes</a>
      <a class="m-2 btn btn-info" href="/admin/cv/edit">CV</a>
      <a class="m-2 btn btn-info" target="_blank" href="https://compressor.io/">Bilžu samazināšanas rīks
        (compressor.io)</a>
      <hr class="w-100">
      <a class="m-2 btn btn-danger" href="{{ route('logout') }}"
         onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        Atslēgties
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
  </x-slot>
</x-admin-app-layout>
