<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler navbar-light bg-dark navbar-btn" type="button" data-toggle="collapse"
          data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav d-flex align-items-center">
      <li class="{{ (request()->is('/admin')) ? 'active' : '' }}nav-item">
        <a class="nav-link" href="/admin">Administrācijas sākumlapa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="/">Galvenā mājaslapa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://compressor.io/">Bilžu samazināšana izmērā</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          Iziet
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>
