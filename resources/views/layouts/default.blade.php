<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('inc.head')
</head>
<body oncontextmenu="return false">
@yield('content')
@include('inc.footer', Request::is('/') ? ['index' => true] : ['index' => false])
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>
</html>
