@extends('layouts.admin-default')
@section('content')
@include('inc.admin-navbar')
<div class="container mt-4">
   @include('inc.status-messages')
   <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
         <h2 class="admin__headings">Pievienot jaunas bildes</h2> 
      </div>
   </div>
   <div class="row justify-content-center m-2">
      @if(!$categories->isEmpty())
      <form action="/admin/bildes" enctype="multipart/form-data" method="post">
         @csrf
         <div class="form-group">
            <select class="custom-select" name="selected-category" required>
               <option selected>Izvēlies kategoriju</option>
               @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <input type="file" name="photos[]" multiple required>
         </div>
         <div class="admin-buttons">
         <button type="submit" class="btn btn-success">Pievienot</button>
         <a href="/admin" class="btn btn-secondary" data-dismiss="modal">Atpakaļ</a>
      </div>
      </form>
      @else
         <p>Vispirms pievieno kategoriju <a href="/admin/kategorijas">šeit</a>, lai varētu pievienot bildes. :)</p>
      @endif
   </div>
</div>
@stop