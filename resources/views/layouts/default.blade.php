<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include('inc.head')
</head>
<body oncontextmenu="return false">
<div id="app">
  @yield('content')
  @include('inc.footer', Request::is('/') ? ['index' => true] : ['index' => false])
</div>
</body>
</html>
