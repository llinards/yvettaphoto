<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('inc.head')
    @include('inc.js')
</head>
<body oncontextmenu="return false">
@yield('content')
@include('inc.footer')
</body>
</html>
