<nav class="navbar navbar-expand-lg fixed-top">
    <a href="{{ ($index) ? '#home' : '/' }}" class="navbar-brand">
        <img class="img-fluid yvettaphoto-logo" width="150" src="../img/logo.png" alt="">
    </a>
    <button type="button" class="navbar-toggler navbar-light bg-dark navbar-btn" data-toggle="collapse"
            data-target="#nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="nav">
        <ul class="navbar-nav">
            @if($index)
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="#portfolio">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="/artist-statement">Artist Statement</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="#aboutMe">About
                        Me</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="#contactMe">Contact
                        Me</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border"
                        href="{{ (isset($photos)) ? '/#portfolio' : URL::previous() }}">
                        <i class="fas fa-chevron-left"></i> Back</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
