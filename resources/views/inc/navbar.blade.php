<nav class="navbar navbar-expand-lg">
    <div class="navbar-logo">
        <a href="{{ ($index) ? '#home' : '/' }}">
            <img class="img-fluid logo-white" src="../img/logo-svg-white.svg" alt="">
            <img class="img-fluid logo-black" src="../img/logo-black.png" alt="">
        </a>
    </div>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#nav">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="nav">
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
                    <a class="nav-link text-uppercase anime-border" href="/about-me">About
                        Me</a><span class="menu-divider"> |</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border" href="#contactMe">Contact
                        Me</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border"
                        href="{{ (isset($photos)) ? '/#portfolio' : URL::previous() }}">
                        <i class="fas fa-chevron-left"></i> Back</a>
                </li>
            @endif
        </ul>
    </div>
</nav>
