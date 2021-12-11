<nav class="navbar navbar-expand-lg desktop">
  <div class="navbar-logo">
    <a href="/">
      <img class="img-fluid" src="../img/logo-black.png" alt="">
    </a>
  </div>
  <div class="collapse navbar-collapse justify-content-center" id="nav">
    <ul class="navbar-nav">
      {{-- @if ($index) --}}
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark text-dark {{ Request::is('/') ? 'current-link' : '' }}" href="/">Home</a><span
          class="menu-divider text-dark"> |</span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark text-dark {{ Request::is('portfolio') ? 'current-link' : '' }}"
          href="/portfolio">{{ isset($photos) ? 'back to portfolio' : 'Portfolio' }}</a><span class="menu-divider text-dark"> |</span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark text-dark {{ Request::is('bio') ? 'current-link' : '' }}" href="/bio">Bio</a><span
          class="menu-divider text-dark"> |</span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark text-dark {{ Request::is('contact-me') ? 'current-link' : '' }}" href="/contact-me">Contact
          Me</a>
      </li>
      {{-- @else
                <li class="nav-item">
                    <a class="nav-link text-uppercase anime-border-dark text-dark"
                        href="{{ (isset($photos)) ? '/' : URL::previous() }}">Back</a>
                </li>
            @endif --}}
    </ul>
  </div>
</nav>

<nav class="navbar {{ $index ? '' : 'navbar-not-index' }} navbar-expand-lg mobile">
  <div class="navbar-logo">
    <a href="/">
      <img class="img-fluid" src="../img/logo-black.png" alt="">
    </a>
  </div>
  {{-- @if ($index) --}}
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </button>
  <div class="collapse navbar-collapse justify-content-center" id="nav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark {{ Request::is('/') ? 'current-link' : '' }}" href="/">Home</a><span class="menu-divider">
          |</span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark {{ Request::is('portfolio') ? 'current-link' : '' }}" href="/portfolio">Portfolio</a><span
          class="menu-divider"> |</span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark {{ Request::is('bio') ? 'current-link' : '' }}" href="/bio">Bio</a><span class="menu-divider">
          |</span>
      </li>
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark {{ Request::is('contact-me') ? 'current-link' : '' }}" href="/contact-me">Contact
          Me</a>
      </li>
    </ul>
  </div>
  {{-- @else
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-uppercase anime-border-dark" href="{{ isset($photos) ? '/#portfolio' : URL::previous() }}">Back</a>
      </li>
    </ul>
  @endif --}}
</nav>
