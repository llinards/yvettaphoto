<form action="/admin/kategorijas" enctype="multipart/form-data" method="post">
   @csrf
   @method('PATCH')
   <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Rediģēt kategoriju</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-4">
               <input type="hidden" name="category-id" id="modelToEditId">
               <div class="form-group">
                  <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
                  <input id="modelToEditName" name="category-name" type="text" class="form-control @error('category-name') is-invalid @enderror">
               </div>
               <div class="form-group">
                  <label for="category-cover" class="col-form-label">Kategorijas titulbilde</label>
                  <input type="file" class="form-control-file" name="category-cover" id="category-cover">
                  <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px</small>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success">Atjaunot kategoriju</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
            </div>
         </div>
      </div>
   </div>
</form>