<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('inc.head')
    @include('inc.js')
</head>
<body>
@yield('content')
@include('inc.footer')
</body>
</html>
