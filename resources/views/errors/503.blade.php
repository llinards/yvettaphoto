<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>YVETTA PHOTO</title>
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet"/>
</head>
<body>
<section class="d-flex justify-content-center align-items-center flex-column mx-2 maintenance-page">
  <div class="text-center mb-2">
    <img src="../img/logo-black.png" class="img-fluid w-25" alt="YVETTA PHOTO logo">
  </div>
  <h2 class="fw-bold text-center text-uppercase">Maintenance!</h2>
  <h3 class="fw-bold text-center">We'll be right back!</h3>
</section>
</body>
</html>
