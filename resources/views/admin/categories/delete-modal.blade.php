<form action="/admin/kategorijas" method="POST">
   @csrf
   @method('DELETE')
   <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Vai tiešām vēlies dzēst šo kategoriju?</h5>
            <input type="hidden" name="category-id" id="modelToDeleteId">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-footer">
               <small class="form-text text-muted">Bildes, kas ir saistītas ar šo kategoriju tiks dzēstas</small>
               <button type="submit" class="btn btn-danger">Dzēst</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
            </div>
         </div>
      </div>
   </div>
</form>