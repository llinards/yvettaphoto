<x-admin-app-layout>
  <x-slot name="header">
    <h2>Izveidot jaunu aktualitāti</h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-lg-6 offset-lg-3 col-12">
      <form action="{{route('news.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
          <label for="news-title" class="col-form-label">Virsraksts</label>
          <input type="text" class="form-control" value="{{ old('news-title') }}" name="news-title"
                 id="news-title" placeholder="Virsraksts">
        </div>
        <div class="form-group">
          <label for="description-textarea">Saturs</label>
          <x-description-text-area/>
        </div>
        <div class="form-group">
          <label for="multiple-images" class="col-form-label">Bildes</label>
          <x-file-upload type="multiple-images"/>
          <small class="form-text text-muted"><strong>Bildēm ir jābūt maksimāli mazākā izmērā. Ieteicams izmantot 1 vai
              2
              bildes.</strong></small>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-secondary" href="{{route('news.index')}}">Atpakaļ</a>
          <button type="submit" class="btn btn-success">Pievienot aktualitāti</button>
        </div>
      </form>
    </div>
  </x-slot>
</x-admin-app-layout>

