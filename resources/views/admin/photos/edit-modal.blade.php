<div class="modal fade" id="update-image-info-{{$image->id}}">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      <div class="container">
        <div class="row flex-column m-2">
          <div>
            <h5 class="font-weight-bold">Kamera:</h5>
            <p class="mb-2">{{$image->camera_make}}</p>
            <p>{{$image->camera_model}}</p>
          </div>
          <div>
            <h5 class="font-weight-bold">Kameras iestatījumi:</h5>
            <p class="mb-2">ISO: {{$image->iso}}</p>
            <p class="mb-2">ƒ: {{$image->f_number}}</p>
            <p class="mb-0">Exposure time: {{$image->exposure_time}}</p>
          </div>
          <hr class="w-100">
          <form action="{{route('category.images.update', [$image->id])}}" class="mb-2"
                enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $image->id }}">
            <div class="row">
              <div class="col-6 form-group">
                <label for="image-title" class="font-weight-bold">Bildes nosaukums</label>
                <input type="text" class="form-control" value="{{ $image->title }}" name="image-title">
              </div>
              <div class="col-6 form-group">
                <label for="image-alt-attribute" class="font-weight-bold">Bildes "alt" vērtība:</label>
                <input type="text" class="form-control" value="{{ $image->alt_attribute }}"
                       name="image-alt-attribute">
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Aizvērt</button>
              <button type="submit" class="btn btn-success">Saglabāt</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

