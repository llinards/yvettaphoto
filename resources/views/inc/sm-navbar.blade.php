<nav class="navbar navbar-expand-md fixed-top">
    <a href="../" class="navbar-brand">
        <img class="img-fluid" width="150" src="../img/logo.png" alt="">
    </a>
   <button type="button" class="navbar-toggler navbar-light bg-dark navbar-btn" data-toggle="collapse" data-target="#nav">
      <span class="navbar-toggler-icon"></span>
   </button>

    <div class="collapse navbar-collapse justify-content-end" id="nav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="/">
                <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark text-uppercase font-weight-bold px-3 anime-border" href="{{ URL::previous() }}">
                <i class="fas fa-chevron-left"></i> Back</a>
            </li>
        </ul>
    </div>
</nav>