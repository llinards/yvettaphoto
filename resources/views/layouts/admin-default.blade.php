<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Administrācijas panelis</title>
    @include('inc.css')
    @include('inc.js')
</head>
<body>
@if(!isset($loginPage))
    @include('inc.admin-navbar')
@endif
@yield('content')
</body>
</html>
