<form action="/admin/zinas/{{$id}}/delete" method="POST">
   @csrf
   @method('DELETE')
   <div class="modal fade" id="delete-news-modal">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Vai tiešām vēlies dzēst šo ziņu?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-danger">Dzēst</button>
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
            </div>
         </div>
      </div>
   </div>
</form>
