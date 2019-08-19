<form action="/admin/kategorijas" enctype="multipart/form-data" method="post">
   @csrf
   <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Jaunas kategorijas izveidošana</h5>
            <input type="hidden" name="category-id" id="category-id">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body p-4">
               <div class="form-group">
                  <label for="category-name" class="col-form-label">Kategorijas nosaukums</label>
                  <input type="text" class="form-control @error('category-name') is-invalid @enderror" value="{{ old('category-name') }}" name="category-name" id="category-name" placeholder="Kategorijas nosaukums šeit" required>
               </div>
               <div class="form-group">
                  <label for="category-cover" class="col-form-label">Kategorijas titulbilde</label>
                  <input type="file" class="form-control-file" name="category-cover" id="category-cover" required>
                  <small class="form-text text-muted">Bilde automātiski tiks sagriezta 600x600px</small>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-success">Pievienot kategoriju</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
            </div>
         </div>
      </div>
   </div>
</form>