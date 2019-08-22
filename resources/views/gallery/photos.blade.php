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
               <div class="item photo">
                  <div class="content">
                     <a href="/img/black-white/0111_1200px.jpg" data-lightbox="{{ $category->id }}">
                        <img class="photothumb" src="../img/black-white/0111_1200px.jpg">
                     </a>
                  </div>
               </div>
               <div class="item photo">
                  <div class="content">
                     <a href="/img/black-white/0115_1200px.jpg" data-lightbox="{{ $category->id }}">
                        <img class="photothumb" src="/img/black-white/0115_1200px.jpg">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
         