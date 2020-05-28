@extends('layouts.admin-default')
@section('content')
@include('inc.admin-navbar')
<div class="container mt-4">
   @include('inc.status-messages')
   <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
         <h2 class="admin__headings">Kategorijas</h2>
         <div>
            <a href="/admin/kategorijas/jauna" class="btn btn-success">Pievienot jaunu kategoriju</a>
         </div>
      </div>
   </div>
   @include('categories.delete-modal')
   <div class="row">
      @if(!$categories->isEmpty())
         @foreach($categories as $category)
         <div class="col-xs-12 col-md-6 col-lg-4 mt-4">
            <div class="card" style="width: 18rem; margin: 0 auto;">
               <img src="/storage/{{ $category->cover_photo_url }}" class="card-img-top" alt="...">
               <div class="card-body">
                  <h5 class="card-title text-center">{{ $category->name }}</h5>
                  <div class="text-center">
                     <a class="btn btn-success mt-1" href="/admin/{{ $category->category_slug }}/bildes">Bildes šajā kategorijā</a>
                     <a class="btn btn-warning mt-1" href="/admin/kategorijas/{{ $category->category_slug }}/edit">Rediģēt kategoriju</a>
                     <button class="btn btn-danger mt-1 deleteCategory" data-toggle="modal" data-categoryid="{{ $category->id }}">Dzēst kategoriju</button>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      @else
      <div class="text-center w-100">
         <p>Nav nevienas kategorijas! Pievieno, lai kaut ko redzētu šeit! :)</p>
      </div>
      @endif
   </div>
</div>
@stop
