<nav class="navbar navbar-expand-lg fixed-top">
    {{-- <div class="navbar-logo">
        <a href="{{ ($index) ? '#home' : '/' }}">
            <img class="img-fluid yvettaphoto-logo" src="../img/logo-svg-white.svg" alt="">
        </a>
    </div> --}}
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#nav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav">
            @if($index)
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border" href="#home">Home</a><span class="menu-divider"> |</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border" href="#portfolio">Portfolio</a><span class="menu-divider"> |</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border" href="/artist-statement">Artist Statement</a><span class="menu-divider"> |</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border" href="#aboutMe">About
                        Me</a><span class="menu-divider"> |</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase px-3 anime-border" href="#contactMe">Contact
                        Me</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-uppercase px-3 anime-border"
                        href="{{ (isset($photos)) ? '/#portfolio' : URL::previous() }}">
                        <i class="fas fa-chevron-left"></i> Back</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
