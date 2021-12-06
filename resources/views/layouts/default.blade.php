<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  @include('inc.head')
</head>
{{-- <body oncontextmenu="return false"> --}}

<body>
  <div id="app">
    @yield('content')
    @include('inc.footer', Request::is('/') ? ['index' => true] : ['index' => false])
  </div>
  @include('inc.js')
</body>

</html>
