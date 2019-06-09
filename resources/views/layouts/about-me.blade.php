<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>About Me | YVETTA photo</title>
    @include('inc.css')
    @yield('css')
</head>
<body>
  <div id="contents">
    @include('about-me.index')
    @yield('about-me')
    @include('inc.footer')
    @yield('footer')
  </div>
@include('inc.js')
@yield('js')

</body>
</html>