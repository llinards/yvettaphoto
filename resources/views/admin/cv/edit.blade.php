<x-admin-app-layout>
  <x-slot name="header">
    <h2>Rediģēt CV</h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-lg-6 offset-lg-3 col-12">
      <form action="/admin/cv" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <input type="text" style="display: none;" name="id" value="{{ $cv->id }}">
        <div class="form-group">
          @error('cv-content')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <x-description-text-area>
            {{ $cv->content }}
          </x-description-text-area>
        </div>
        <button type="submit" class="btn btn-success">Atjaunot</button>
        <a class="btn btn-secondary" href="/admin">Atpakaļ</a>
      </form>
    </div>
  </x-slot>
</x-admin-app-layout>
