@extends('layouts.admin-default')
@include('admin.navbar')
<div class="container mt-4">
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
               <a href="#" class="btn btn-warning">Rediģēt kategoriju</a>
               <a href="#" class="btn btn-danger mt-2">Dzēst kategoriju</a>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>

   {{-- <div class="row pt-4">
      <table class="table">
      <thead>
         <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-center">Kategorijas nosaukums</th>
            <th scope="col" class="text-center">Kategorijas Bilde</th>
            <th scope="col" class="text-center">Darbības</th>
         </tr>
      </thead>
      <tbody style="border-bottom: 2px solid #dee2e6">
         @foreach($categories as $category)
         <tr>
            <th />
            <td class="text-center"><h3 class="font-weight-bold">{{ $category->name }}</h3></td>
            <td class="text-center">
               <img class="img-thumbnail" style="max-width:250px" src="/storage/{{ $category->cover_photo_url }}" alt="">
            </td>
            <td class="text-center">
            <a href="#" role="button" class="btn btn-warning m-1 p-2">Rediģēt kategoriju</a>
            <a href="#" role="button" class="btn btn-danger m-1 p-2">Dzēst kategoriju</a>
            </td>
         </tr>
         @endforeach
      </tbody>
      </table>
   </div> --}}
</div>