<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MUNO</title>
    @include('inc.css')
    @yield('css')
</head>
<body>
  <div id="contents">
   @include('inc.navbar')
   @yield('navbar')
   @include('home.header')
   @yield('header')
   @include('home.portfolio')
   @yield('portfolio')
   @include('home.about-me')
   @yield('about-me')
   @include('home.contact-me')
   @yield('contact-me')
   @include('inc.footer')
   @yield('footer')
  </div>
@include('inc.js')
@yield('js')

</body>
</html>