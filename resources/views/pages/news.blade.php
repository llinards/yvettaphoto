@extends('layouts.default', ['title' => 'News'])
@section('content')
  @include('inc.navbar', ['index' => false])
  <section>
    <div class="container">
      <div class="heading d-flex align-items-center justify-content-between">
        <div class="underline"></div>
        <h1 class="text-uppercase text-center main-header">news</h1>
        <div class="underline"></div>
      </div>
      @foreach($allNews as $newsItem)
        <div class="row">
          <div class="col-lg col-sm-12 d-flex flex-column justify-content-center news-item-content">
            {!! $newsItem->description !!}
            <p class="small main-text">Created: {{ date_format($newsItem->created_at, "d/m/Y") }}</p>
          </div>
          <div class="col-lg col-sm-12 d-flex flex-column align-items-lg-end align-items-center">
            @foreach($newsItem->images as $image)
              <img src="{{$image['image_name']}}" width="300" class="img-fluid my-2" alt="">
            @endforeach
          </div>
        </div>
        <hr>
      @endforeach
{{--      <div class="row">--}}
{{--        <div class="col-lg col-sm-12 d-flex flex-column justify-content-center">--}}
{{--          <p class="lead main-text">I am honored to be selected for an online exhibition in the 2022 International Juried Exhibition, juried by Paul Kopeikin at the Center for Photographic Art. </p>--}}
{{--          <p class="lead main-text">Exhibition on view: November 19 – December 29, 2022. <a href="https://photography.org/event/2022-international-juried-exhibition/" target="_blank">https://photography.org/event/2022-international-juried-exhibition/</a></p>--}}
{{--          <p class="lead main-text">See entire project “The close embrace” <a href="https://yvettaphoto.com/portfolio/the-close-embrace">here</a>.</p>--}}
{{--          <p class="small main-text">01/01/2022</p>--}}
{{--        </div>--}}
{{--        <div class="col-lg col-sm-12 d-flex flex-column align-items-lg-end align-items-center">--}}
{{--          <img src="../img/news/look-over-la-2022.jpg" width="300" class="img-fluid my-2" alt="">--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am thrilled to participate in the exhibition “Abstract Rhythm & Blue Notes,” which will run at The Horsebridge Arts Centre in Whitstable, Kent, from November 16 - 28, 2022.</p>--}}
{{--          <p class="lead main-text">The genesis of the exhibition was an intensive year-long exploration of the intersection of photography, abstraction, and creativity under the tutelage of Bailey and Chinnery.</p>--}}
{{--          <p class="lead main-text">For more information about the exhibition, the opening reception, and a full schedule of talks and workshops, go to: <a href="https://www.arbnexhibition.co.uk" target="_blank">www.arbnexhibition.co.uk</a></p>--}}
{{--          <div class="text-center mb-5 mt-5">--}}
{{--            <img src="../img/news/arbnexhibition-banner-2022.jpeg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am honored to take part with my photograph “Look over” and “Solstice” in the exhibition “Shape - Barcelona” at PH21@Barcelona gallery. A curated international photography exhibition from November 3- 13, 2022.</p>--}}
{{--          <p class="lead main-text"><a href="https://www.ph21gallery.com/shape-barcelona-22-october" target="_blank">https://www.ph21gallery.com/shape-barcelona-22-october</a></p>--}}
{{--          <p class="lead main-text">The photo “Look over” received honorable mention.</p>--}}
{{--          <p class="lead main-text">See entire project “The close embrace” <a href="https://yvettaphoto.com/portfolio/the-close-embrace">here</a>.</p>--}}
{{--          <div class="text-center mb-5 mt-5">--}}
{{--            <img src="../img/news/solstice.jpg" width="350" class="img-fluid p-1" alt="">--}}
{{--            <img src="../img/news/look-over-la-2022.jpg" width="350" class="img-fluid p-1" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am honored that my project “The close embrace” to be chosen by DODHO Magazine as one of the concept.</p>--}}
{{--          <p class="lead main-text"><a href="https://www.dodho.com/visual-meditation-the-close-embrace-by-iveta-lazdina/" target="_blank">www.dodho.com</a></p>--}}
{{--          <p class="lead main-text">See entire project “The close embrace” <a href="https://yvettaphoto.com/portfolio/the-close-embrace">here</a>.</p>--}}
{{--          <div class="text-center mb-5 mt-5">--}}
{{--            <img src="../img/news/look-over-la-2022.jpg" width="350" class="img-fluid p-1" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am honored to take part with my photograph “Look over” in Pop up <a href="https://lacphoto.org/undercurrents-pop-up-members-exhibition-at-summer-on-7th-2022/" target="_blank">LACP (Los Angeles Centre for Photography)</a> Members exhibition at Summer on the 7th.</p>--}}
{{--          <p class="lead main-text">See entire project “The close embrace” <a href="https://yvettaphoto.com/portfolio/the-close-embrace">here</a>.</p>--}}
{{--          <div class="text-center mb-5 mt-5">--}}
{{--            <img src="../img/news/look-over-la-2022.jpg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am honored to take part with my photograph “LIGHT SILENCE” in “Work of eARTh” show at the WithINSight Gallery (Chicago Photography Classes), Chicago.</p>--}}
{{--          <p class="lead main-text"><a href="https://chicagophotoclasses.com/2022/04/24/work-of-earth-show/" target="_blank">chicagophotoclasses.com</a></p>--}}
{{--          <p class="lead main-text">See entire project “SPRING” <a href="https://yvettaphoto.com/portfolio/spring">here</a>.</p>--}}
{{--          <div class="text-center mb-5 mt-5">--}}
{{--            <img src="../img/news/light-silence-fine-art-photography.jpg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am so happy to be selected with my image “Contradictions” for the online--}}
{{--            exhibition “Trees” in ASMITH GALLERY photographic arts, Johnson City, Texas.</p>--}}
{{--          <p class="lead main-text"><a href="https://asmithgallery.com/current-exhibition/" target="_blank">asmithgallery.com</a></p>--}}
{{--          <p class="lead main-text">The image ”Contradictions” has been included in the book “The 27”.</p>--}}
{{--          <p class="lead main-text">The photograph "CONTRADICTIONS" is created within the project "THE CLOSE EMBRACE." Please see all images from the project in the <a href="https://yvettaphoto.com/portfolio/the-close-embrace">gallery</a>.</p>--}}
{{--          <div class="text-center mb-5 mt-5">--}}
{{--            <img src="../img/news/contradictions.jpg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">I am honored that two of my images have been selected for “Dreams and Imaginings”--}}
{{--            exhibition in our Middlebury, Vermont gallery.--}}
{{--            The photograph “Let’s Go Lost” received Juror’s Susan Burnstine AWARD.</p>--}}
{{--          <p class="lead main-text"><a href="https://photoplacegallery.com/" target="_blank">photoplacegallery.com</a>--}}
{{--          </p>--}}
{{--          <p class="lead main-text">The photograph “Let’s Go Lost” is included in the Gallery exhibition.</p>--}}
{{--          <div class="text-center mt-3 mb-3">--}}
{{--            <img src="../img/news/lets-go-lost.jpg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--          <p class="lead main-text mb-5">To see the entire project “Strokes of Time Square” please visit the <a--}}
{{--              href="https://yvettaphoto.com/portfolio/strokes-of-time-square">portfolio</a>.</p>--}}
{{--          <p class="lead main-text">The photograph “Over-crossing” is included in the online exhibition.</p>--}}
{{--          <div class="text-center mt-3 mb-3">--}}
{{--            <img src="../img/news/over-crossing.jpg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--          <p class="lead main-text mb-5">To see the entire project “Abstract Street Photographs” please visit the <a--}}
{{--              href="https://yvettaphoto.com/portfolio/abstract-street-photographs">portfolio</a>.</p>--}}
{{--          <p class="lead main-text">The exhibition “Dreams and Imaginings “ will open Thursday, April 28, and remain--}}
{{--            open through May.</p>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--      <hr>--}}
{{--      <div class="row">--}}
{{--        <div class="col">--}}
{{--          <p class="lead main-text">The photo “Wild” has been selected by juror, Susan Burnstine. It will be included--}}
{{--            in the exhibition “All About the Light” at--}}
{{--            The SE Center for Photography.</p>--}}
{{--          <p class="lead main-text"><a href="https://www.sec4p.com/new-index" target="_blank">www.sec4p.com</a></p>--}}
{{--          <p class="lead main-text">To visit full project “Spring” please visit <a--}}
{{--              href="https://yvettaphoto.com/portfolio/spring">portfolio</a>.</p>--}}
{{--          <p class="lead main-text">All About the Light will open Friday, March 4, and remain open through March.</p>--}}
{{--          <div class="text-center mt-5">--}}
{{--            <img src="../img/news/wild.jpg" width="350" class="img-fluid" alt="">--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
    </div>
  </section>
@stop
