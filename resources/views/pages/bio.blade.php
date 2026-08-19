@extends('layouts.default', ['title' => 'BIO'])
@section('content')
    @include('inc.navbar', ['index' => false])
    <section>
        <div class="container">
            <div class="heading d-flex align-items-center justify-content-between">
                <div class="underline"></div>
                <h1 class="text-uppercase text-center main-header">BIO</h1>
                <div class="underline"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="main-text-img text-center mb-5">
                        <img src="../img/iveta-lazdina-artist-statement.jpeg" width="250" class="img-fluid" alt="">
                    </div>
                    <p class="lead main-text-mb-3">
                        Iveta Lazdina is a Latvian fine art photographer working between figuration and abstraction. She
                        uses intentional camera movement (ICM), multiple exposure, and mix media processes, including
                        collage with photographs and Polaroid prints, layering, and overpainting.</p>
                    <p class="lead main-text-mb-3">
                        Lazdina studied at the Photo Academy in Riga and has continued to develop her practice through
                        international workshops and mentorships. Her first photograph presented to a wider audience was
                        shown at the Latvian Pavilion at Expo 2000 in Hannover.</p>
                    <p class="lead main-text-mb-3">
                        Her work has been featured in Lenscratch (2023), Dodho (2022), ICM Photography Magazine (2021–2022),
                        and LeMag (2021). She has participated in international group exhibitions in the United States and
                        Europe, including exhibitions at the Center for Photographic Art in Carmel, California; PhotoPlace
                        Gallery in Middlebury, Vermont; SE Center for Photography in Greenville, South Carolina; PH21
                        galleries in Budapest and Barcelona; and The Horsebridge Arts Centre in Whitstable, Kent, UK.</p>
                    <p class="lead main-text-mb-3">
                        Her work has received several awards and recognitions, including the Juror’s Award selected by Susan
                        Burnstine at ASmith Gallery for “Where Certainty Ends” (2026), Bronze Awards from Camelback Gallery
                        for “Inevitability” and “Resilience” (2025), as well as several Honorable Mentions in period from
                        2022 to 2024.</p>
                    <p class="lead main-text-mb-3">
                        Lazdina lives and works in Latvia.
                    </p>
                    <hr />
                    <p class="lead main-text">Iveta Lazdiņa ir mix medis fotogrāfe, kas strādā starp figurālo un abstrakto
                        fotogrāfiju. Savos darbos viņa izmanto apzinātu kameras kustību (ICM), daudzkārtēju ekspozīciju un
                        mix media procesus, tostarp kolāžas ar fotogrāfijām un Polaroid izdrukām, slāņošanu un gleznošanu uz
                        fotogrāfijām.</p>
                    <p class="lead main-text-mb-3">
                        Lazdiņa ir studējusi Rīgas Fotoakadēmijā un turpinājusi attīstīt savu praksi starptautiskās
                        meistarklasēs un mentoringa programmās. Viņas pirmā fotogrāfija, kas tika parādīta plašākai
                        auditorijai, bija eksponēta Latvijas paviljonā Expo 2000 Hannoverē.
                    </p>
                    <p class="lead main-text-mb-3">
                        Viņas darbi ir publicēti Lenscratch (2023), Dodho (2022), ICM Photography Magazine (2021–2022) un
                        LeMag (2021). Lazdiņa ir piedalījusies starptautiskās grupu izstādēs ASV un Eiropā, tostarp Center
                        for Photographic Art Karmelā, Kalifornijā; PhotoPlace Gallery Midlberijā, Vērmontā; SE Center for
                        Photography Grīnvilā, Dienvidkarolīnā; PH21 galerijās Budapeštā un Barselonā; kā arī The Horsebridge
                        Arts Centre Vitstablā, Kentā, Apvienotajā Karalistē.
                    </p>
                    <p class="lead main-text-mb-3">
                        Viņas darbi ir saņēmuši vairākus apbalvojumus un atzinības, tostarp Susan Burnstine piešķirto
                        Juror’s Award ASmith Gallery par darbu “Where Certainty Ends” (2026), Camelback Gallery Bronze
                        Awards par darbiem “Inevitability” un “Resilience” (2025), kā arī vairākus Honorable Mentions no
                        2022. līdz 2024. gadam.
                    </p>
                    <p class="lead main-text-mb-3">
                        Iveta Lazdiņa dzīvo un strādā Latvijā.</p>
                    <div class="submit-btn pt-0 text-center mb-3">
                        <button class="btn" id="read-more-bio-btn" type="button" data-toggle="collapse"
                            data-target="#read-more-bio" aria-expanded="false" aria-controls="read-more-bio">
                            READ MORE
                        </button>
                    </div>
                    <div class="collapse" id="read-more-bio">
                        <div class="main-text-img text-center mb-3">
                            <img src="../img/about-me/Hannover_web_story.jpg" width="350" class="img-fluid"
                                alt="">
                        </div>
                        <p class="lead main-text mb-5">Her first photograph presented to a wider audience appeared at the
                            Latvian
                            Pavilion during Expo 2000 in Hannover. The image reflected an early interest in environmental
                            change and
                            responsibility, aligning with a period of growing ecological awareness within Latvia’s cultural
                            landscape.
                            This early public presentation became an important point of departure in the development of her
                            photographic practice.</p>
                        <h3 class="text-uppercase text-center main-text">ENJOY AND BE INSPIRED BY THE PHOTOS!</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
