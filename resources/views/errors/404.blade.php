<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>404 | YVETTA PHOTO</title>
  @vite('resources/sass/app.scss')
</head>
<body>
<section class="d-flex justify-content-center align-items-center flex-column mx-2 maintenance-page">
  <div class="text-center mb-2">
    <img src="../img/logo-black.png" class="img-fluid w-25" alt="YVETTA PHOTO logo">
  </div>
  <h2 class="fw-bold text-center text-uppercase">Page not found!</h2>
</section>
</body>
</html>
