<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     @yield('title')
    @yield('customcss')
  </head>
  <body class="wysihtml5-supported skin-blue">
      @include('genral.includes.header')
      @include('genral.includes.sidebar')

      @yield('content')
      
    @include('genral.includes.footer')
    @yield('customjs')
  </body>
</html>