<nav class="navbar navbar-expand-md fixed-top">
    <a href="../" class="navbar-brand">
        <img class="img-fluid" width="150" src="../img/logo.png" alt="">
    </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>

    <div class="collapse navbar-collapse justify-content-end" id="nav">
        <ul class="navbar-nav">
            <li class="nav-item about-me__nav-links">
                <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border about-me__nav-link" href="/">Home</a>
            </li>
            <li class="nav-item about-me__nav-links">
                <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border about-me__nav-link" href="{{ URL::previous() }}">
                    <i class="fas fa-chevron-left"></i> Back</a>
            </li>
        </ul>
    </div>
</nav>