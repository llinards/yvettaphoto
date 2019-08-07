@extends('layouts.default')
<div class="container">
 <h1>Kategorijas</h1> 
 <div class="row">
   <table class="table">
     <thead>
       <tr>
         <th scope="col">#</th>
         <th scope="col">Kategorijas nosaukums</th>
         <th scope="col">Kategorijas Bilde</th>
         <th scope="col">Darbības</th>
       </tr>
     </thead>
     <tbody>
       <tr>
         <th />
         <td>Black&White</td>
         <td>
          <img style="max-width:100px;height:auto;" src="img/cover-photos/600x600_bw.png" alt="">
         </td>
         <td>
           <a href="#" role="button" class="btn btn-warning p-1">Rediģēt kategoriju</a>
           <a href="#" role="button" class="btn btn-danger p-1">Dzēst kategoriju</a>
         </td>
       </tr>
     </tbody>
   </table>
 </div>
</div>