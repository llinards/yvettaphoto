<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
 @include('inc.head')
</head>
<body>
 @yield('content')
 @include('inc.js')
</body>
</html>