@extends('layouts.admin-default')
@section('content')
@include('inc.admin-navbar')
<div class="container mt-4">
   @include('inc.status-messages')
   <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
         <h2 class="admin__headings">{{ $category->name}}</h2> 
         <a href="/admin/bildes/jaunas" class="btn btn-success">Pievienot jaunas bildes</a>
      </div>
   </div>
   @include('photos.delete-modal')
   <div class="row">
      @if(!$images->isEmpty())
         @foreach($images as $image)
         <div class="col-xs-12 col-md-6 col-lg-4 mt-4">
            <div class="card" style="width: 18rem; margin: 0 auto;">
               <img src="/storage/{{ $image->image_name }}" class="card-img-top" alt="...">
               <div class="card-body">
                  <div class="text-center">
                     <button class="btn btn-danger mt-1 deleteImage" data-toggle="modal" data-imageid="{{ $image->id }}">Dzēst bildi</button>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      @else
      <div class="text-center w-100">
         <div>
            <p>Nav nevienas bildes šajā kategorijā! Pievieno, lai kaut ko redzētu šeit! :)</p>
            <a class="btn btn-success" href="/admin/bildes/jaunas">Pievienot bildes</a>
         </div>
      </div>
      @endif
   </div>
</div>
@stop