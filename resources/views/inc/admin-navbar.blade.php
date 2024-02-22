<nav class="navbar navbar-expand-lg navbar-light bg-light position-relative mb-5">
  <button class="navbar-toggler navbar-light navbar-btn ml-auto border-0" type="button" data-toggle="collapse"
          data-target="#admin-navbar" aria-controls="admin-navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="admin-navbar">
    <ul class="navbar-nav d-flex align-items-center w-100">
      <li class="nav-item">
        <a class="nav-link" href="/admin">Sākums</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/titulbilde/jauna">Mainīt titulbildi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/kategorijas">Kategorijas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/cv/edit">CV</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" target="_blank" href="https://compressor.io/">Bilžu samazināšanas rīks (compressor.io)</a>
      </li>
      <li class="nav-item ml-lg-auto">
        <a class="nav-link" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          Atslēgties
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>
