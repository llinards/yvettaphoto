@extends('layouts.admin-default')
@include('admin.navbar')
{{-- section options --}}
<section class="options">
   <div class="container mt-4">
      <div class="jumbotron">
         <div class="row d-flex flex-column align-items-center">
            <div>
               <h2>Kādas opcijas gribi veikt?</h2>
            </div>
            <div>
               <a href="/admin/kategorijas" class="btn btn-primary">Pievienot jaunu kategoriju</a>
               <a href="#" class="btn btn-primary disabled">Pievienot jaunas bildes</a>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end of section options --}}
{{-- section google analytics --}}
<section class="google-analytics">
   <div class="container mt-4">
      <div class="jumbotron">
         <div class="row d-flex flex-column align-items-center">
            <div>
               <h2>Mājaslapas statistika</h2>
            </div>
            <div>
               <ul class="list-group list-group-flush">
                  <li class="list-group-item display-4">Lapā ir <span class="badge badge-secondary">4</span> bildes</li>
                  <li class="list-group-item display-4">Lapā ir <span class="badge badge-secondary">6</span> kategorijas</li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end of google analytics --}}