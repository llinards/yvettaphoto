@extends('layouts.admin-default',['title' => 'Rediģēt kategoriju'])
@section('content')
    <div class="container mt-4">
        @include('inc.status-messages')
        <div class="jumbotron">
            <div class="d-flex flex-column align-items-center">
                <h2 class="admin__headings">Rediģēt "{{ $category[0]['name'] }}" kategoriju</h2>
            </div>
        </div>
        <div class="row justify-content-center m-2">
            <form action="/admin/kategorijas" enctype="multipart/form-data" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="category-id" value="{{ $category[0]['id'] }}">
                <div class="form-group">
                    <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
                    <input type="text" class="form-control" value="{{ $category[0]['name'] }}" name="category-name"
                           id="category-name" placeholder="Kategorijas nosaukums šeit">
                    @error('category-name')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category-description">Kategorijas apraksts</label>
                    <textarea class="form-control" id="category-description" name="category-description"
                              rows="3">{{ $category[0]['description'] }}</textarea>
                    @error('category-description')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Kategorijas esošā bilde</label>
                    <div>
                        <img src="/storage/{{ $category[0]['cover_photo_url'] }}" class="card-img-top w-50" alt=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category-cover" class="col-form-label">Kategorijas titulbilde</label>
                    <input type="file" class="form-control-file" name="category-cover" id="category-cover">
                    <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px</small>
                    @error('category-cover')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Atjaunot kategoriju kategoriju</button>
                <a class="btn btn-secondary" href="/admin/kategorijas">Atpakaļ</a>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('category-description');
    </script>
@endsection
