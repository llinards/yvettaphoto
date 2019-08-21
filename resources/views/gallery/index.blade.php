<section class="py-5" id="portfolio">
    <div class="container-fluid">
        <div class="row mt-5 justify-content-center">
            <div class="heading">
                <h1 class="display-4 text-uppercase text-center main__headings">Choose category</h1>
                <div class="underline"></div>
            </div>
        </div>
        <div class="row pt-3">
            @foreach($categories as $category)
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3 p-1 gallery-photo">
                <a href="/gallery/{{ $category->id }}">
                    <h3 class="gallery-photo-title text-uppercase text-white p-1">{{ $category->name }}</h3>
                    <img class="img-fluid" src="/storage/{{ $category->cover_photo_url}}" alt="">     
                </a>          
            </div>
            @endforeach
        </div>
    </div>
</section>