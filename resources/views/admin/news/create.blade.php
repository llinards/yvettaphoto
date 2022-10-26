@extends('layouts.admin-default',['title' => 'Jauna ziņa'])
@section('content')
  <div class="container admin-container">
    @include('inc.status-messages')
    <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Izveidot jaunu ziņu</h2>
      </div>
    </div>
    <div class="row justify-content-center m-2">
      <form action="/admin/zinas" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
          <label for="news-title" class="col-form-label">Ziņas virsraksts</label>
          @error('news-title')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <input type="text" class="form-control" value="{{ old('news-title') }}" name="news-title"
                 id="news-title" placeholder="Virsraksts">
        </div>
        <div class="form-group">
          <label for="news-description">Ziņas saturs</label>
          @error('news-description')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          <textarea class="form-control" id="news-description" name="news-description"
                    rows="3"></textarea>

        </div>
        <small class="form-text text-muted"><strong>Bildei ir jābūt maksimāli mazākā izmērā. Ieteicams izmantot 1 vai 2 bildes</strong></small>
        @error('news-image')
        <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="input-group mb-3">
          <div class="custom-file">
            <input type="file" class="custom-file-input" name="news-image[]" multiple id="news-image" aria-describedby="inputGroupFileAddon01">
            <label class="custom-file-label" for="news-image">Izvēlies failu/-us</label>
          </div>
        </div>

        <button type="submit" class="btn btn-success">Pievienot ziņu</button>
        <a class="btn btn-secondary" href="/admin">Atpakaļ</a>
      </form>
    </div>
  </div>
  <script>
    CKEDITOR.replace('news-description');
    document.querySelector('.custom-file-input').addEventListener('change',function(e){
      let fileNames = [];
      const files = document.getElementById("news-image").files;
      for (const key in files) {
        if (files.hasOwnProperty(key)) {
          fileNames.push(files[key]['name']);
        }

      }
      const nextSibling = e.target.nextElementSibling
      nextSibling.innerText = fileNames.join(', ');
    })
  </script>
@endsection
