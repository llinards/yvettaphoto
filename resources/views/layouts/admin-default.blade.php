<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrācijas panelis</title>
    @include('inc.css')
    @include('inc.js')
</head>
<body>
@include('inc.admin-navbar')
@yield('content')
</body>
</html>
