<section class="py-5" id="photos">
   <div class="container-fluid">
      <div class="row mt-5 justify-content-center">
         <div class="heading">
            <h1 class="display-4 text-uppercase text-center main__headings">{{ $category->name }}</h1>
            <div class="underline"></div>
         </div>
      </div>
      <div class="row pt-3">
         <div class="container-fluid">
            <div class="grid">
               @if(!$images->isEmpty())
               @foreach($images as $image)
               <div class="item photo">
                  <div class="content">
                     <a href="/storage/{{ $image->image_name}}" data-lightbox="{{ $category->id }}">
                        <img class="photothumb" src="/storage/{{ $image->image_name}}">
                     </a>
                  </div>
               </div>
               @endforeach
               @else
                  <p>No pictures found!</p>
               @endif
            </div>
         </div>
      </div>
   </div>
</section>
         