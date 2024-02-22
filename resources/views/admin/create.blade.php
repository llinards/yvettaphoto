<x-admin-app-layout>
  <x-slot name="header">
    <h2>Mainīt titulbildi</h2>
  </x-slot>
  <x-slot name="content">
    <div class="col-lg-6 offset-lg-3 col-12">
      <form action="/admin/titulbilde/jauna" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
          <label for="single-img-upload" class="col-form-label">Titulbilde</label>
          <x-single-img-upload/>
          <small class="form-text text-muted"><strong>Bildes
              izmēram jābūt pēc iespējas mazākam.</strong><br/> To samazināt var <a href="https://compressor.io/"
                                                                                    target="_blank">šajā
              lapā</a>.</small>
        </div>
        <div class="d-flex justify-content-between">
          <a class="btn btn-secondary" href="/admin">Atpakaļ</a>
          <button type="submit" class="btn btn-success">Mainīt</button>
        </div>
      </form>
    </div>
  </x-slot>
</x-admin-app-layout>
