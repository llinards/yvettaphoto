<nav class="navbar navbar-expand-lg desktop">
    <div class="navbar-logo">
        <a href="{{ ($index) ? '#home' : '/' }}">
            <img class="img-fluid" src="../img/{{ ($index) ? 'logo-svg-white.svg' : 'logo-black.png' }}" alt="">
        </a>
    </div>
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
                    <a class="nav-link text-uppercase anime-border text-dark"
                        href="{{ (isset($photos)) ? '/#portfolio' : URL::previous() }}">Back</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<nav class="navbar navbar-expand-lg mobile">
    <div class="navbar-logo">
        <a href="{{ ($index) ? '#home' : '/' }}">
            <img class="img-fluid" src="../img/logo-black.png" alt="">
        </a>
    </div>
    @if ($index)
        <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#nav">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="nav">
        <ul class="navbar-nav">
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
        </ul>
    </div>
    @else
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-uppercase anime-border text-dark"
                    href="{{ (isset($photos)) ? '/#portfolio' : URL::previous() }}">Back</a>
            </li>
        </ul>
    @endif
</nav>