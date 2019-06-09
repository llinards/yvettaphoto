@section('gallery')
<!-- navbar -->
    <nav class="navbar navbar-expand-md fixed-top">
        <a href="../" class="navbar-brand">
            <img class="img-fluid" width="150" src="../img/logo.png" alt="">
        </a>
        <button type="button" class="navbar-toggler navbar-light bg-dark navbar-btn" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="nav">
            <ul class="navbar-nav">
                <li class="nav-item about-me__nav-links">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border about-me__nav-link" href="../">
                        <i class="fas fa-chevron-left"></i> Back</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end of navbar -->
    <!-- portfolio -->
    <section class="py-5" id="portfolio">
        <div class="container-fluid">
            <div class="row mt-5 justify-content-center">
                <div class="heading">
                    <h1 class="display-4 text-uppercase text-center">Gallery</h1>
                    <div class="underline"></div>
                </div>
            </div>
            <!-- GALLERY -->
            <ul class="list-inline text-center text-uppercase font-weight-bold my-4">
                <li class="list-inline-item gallery-list-item active-item" data-filter="all">All
                    <span class="text-muted px-md-2 px-sm-1">|</span>
                </li>
                <li class="list-inline-item gallery-list-item" data-filter="blacknwhite">Black&White
                    <span class="text-muted px-md-2 px-sm-1">|</span>
                </li>
                <li class="list-inline-item gallery-list-item" data-filter="creative">Creative
                    <span class="text-muted px-md-2 px-sm-1">|</span>
                </li>
                <li class="list-inline-item gallery-list-item" data-filter="latvia">Latvia
                    <span class="text-muted px-md-2 px-sm-1">|</span>
                </li>
                <li class="list-inline-item gallery-list-item" data-filter="patterns">Patterns
                    <span class="text-muted px-md-2 px-sm-1">|</span>
                </li>
                <li class="list-inline-item gallery-list-item" data-filter="streetphoto">Street Photo
                    <span class="text-muted px-md-2 px-sm-1">|</span>
                </li>
                <li class="list-inline-item gallery-list-item" data-filter="yellowstone">Yellowstone</li>
            </ul>
            <div class="container gallery__container">
                <div class="row justify-content-center gallery__row">
                    <div class="row gallery__collection">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0111_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0111_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0115_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0115_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0129_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0129_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0144_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0144_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0166_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0166_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0214_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0214_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0232_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0232_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0238_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0238_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/black-white/0374_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter blacknwhite p-1">
                                <img src="../img/black-white/0374_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div> -->
                    </div>
                    <div class="row gallery__collection">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/02_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/02_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/03_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/03_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/04_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/04_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/05_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/05_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/06_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/06_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/07_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/07_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/08_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/08_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/09_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/09_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/10_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/10_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/11_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/11_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/12_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/12_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/13_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/13_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/14_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/14_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/15_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/15_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/16_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/16_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/creative/17_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter creative p-1">
                                <img src="../img/creative/17_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="row gallery__collection">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/02_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/02_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/03_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/03_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/09_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/09_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/04_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/04_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/08_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/08_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/05_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/05_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/06_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/06_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/latvia/07_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter latvia p-1">
                                <img src="../img/latvia/07_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="row gallery__collection">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/pattern/02_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter patterns p-1">
                                <img src="../img/pattern/02_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/pattern/03_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter patterns p-1">
                                <img src="../img/pattern/03_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/pattern/04_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter patterns p-1">
                                <img src="../img/pattern/04_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/pattern/05_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter patterns p-1">
                                <img src="../img/pattern/05_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/pattern/06_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter patterns p-1">
                                <img src="../img/pattern/06_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="row gallery__collection">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/streetphoto/02_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter streetphoto p-1">
                                <img src="../img/streetphoto/02_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/streetphoto/03_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter streetphoto p-1">
                                <img src="../img/streetphoto/03_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/streetphoto/04_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter streetphoto p-1">
                                <img src="../img/streetphoto/04_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/streetphoto/05_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter streetphoto p-1">
                                <img src="../img/streetphoto/05_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="row gallery__collection">
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/02_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/02_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/03_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/03_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/04_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/04_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/05_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/05_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/06_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/06_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/07_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/07_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/08_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/08_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/09_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/09_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/10_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/10_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/11_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/11_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/12_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/12_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/13_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/13_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/14_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/14_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/15_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/15_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <a href="../img/yellowstone/16_1200px.jpg" data-toggle="lightbox" data-gallery="example-gallery" class="filter yellowstone p-1">
                                <img src="../img/yellowstone/16_1200px.jpg" width="300" class="img-fluid">
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end of OLD GALLERY -->
    </section>
    <!-- end of portfolio -->
@endsection