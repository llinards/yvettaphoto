<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Administrācijas panelis</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
{{--TODO: Atjaunot šo--}}
@if(!isset($loginPage))
  @include('inc.admin-navbar')
@endif

<div class="container">
  @include('inc.status-messages')
</div>
@if(isset($header))
  <div class="container d-flex align-items-center flex-column">
    {{ $header }}
  </div>
@endif
<div class="container mb-5">
  <div class="row">
    {{ $content }}
  </div>
</div>
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
