@extends('layouts.admin-default')
<div class="container pb-4">
   <div class="d-flex flex-column align-items-center pt-4">
      <h1>Kategorijas</h1> 
      <div>
         <a href="/admin/kategorijas/jauna" class="btn btn-success p-2">Jauna kategorija</a>
      </div>
   </div>
   <div class="row pt-4">
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
   </div>
</div>