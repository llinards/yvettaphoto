@extends('layouts.admin-default',['title' => 'Jauna titulbilde'])
@section('content')
  <div class="container admin-container">
    @include('inc.status-messages')
    <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
        <h2 class="admin__headings">Mainīt titulbildi</h2>
      </div>
    </div>
    <div class="row justify-content-center m-2">
      <form action="/admin/titulbilde/jauna" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
          <label for="main-img-cover" class="col-form-label">Titulbilde</label>
          <input type="file" class="form-control-file" name="single-img-upload" id="single-img-upload">
          <small class="form-text text-muted"><strong>Bildes
              izmēram jābūt pēc iespējas mazākam.</strong><br/> To samazināt var <a href="https://compressor.io/"
                                                                                    target="_blank">šajā
              lapā</a>.</small>
          @error('single-img-upload')
          <p class="text-danger">{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" class="btn btn-success">Mainīt</button>
        <a class="btn btn-secondary" href="/admin">Atpakaļ</a>
      </form>
    </div>
  </div>
  <script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginImagePreview);
    FilePond.create(document.querySelector('input[id="single-img-upload"]'));
    FilePond.setOptions({
      server: {
        url: '/admin/upload',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
      },
      required: true,
      maxFileSize: '1MB',
      allowImagePreview: true,
      acceptedFileTypes: ['image/*'],
    });
  </script>
@endsection
