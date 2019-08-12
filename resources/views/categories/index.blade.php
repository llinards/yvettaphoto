@extends('layouts.admin-default')
@section('content')
@include('admin.navbar')
<div class="container mt-4">
   @include('inc.status-messages')
   <div class="jumbotron">
      <div class="d-flex flex-column align-items-center">
         <h1>Kategorijas</h1> 
         <div>
            <a href="/admin/kategorijas/jauna" class="btn btn-success p-2">Pievienot jaunu kategoriju</a>
         </div>
      </div>
   </div>
   <div class="row">
      @foreach($categories as $category)
      <div class="col-xs-12 col-sm-6 col-md-4 mt-4">
         <div class="card" style="width: 18rem; margin: 0 auto;">
            <img src="/storage/{{ $category->cover_photo_url }}" class="card-img-top" alt="...">
            <div class="card-body">
               <h5 class="card-title text-center">{{ $category->name }}</h5>
               <div class="text-center">
               <a href="/admin/kategorijas/{{ $category->id }}/edit" class="btn btn-warning">Rediģēt kategoriju</a>
               <a href="/admin/kategorijas/{{ $category->id }}/delete" class="btn btn-danger mt-2">Dzēst kategoriju</a>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
@stop