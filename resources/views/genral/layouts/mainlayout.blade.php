<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     @yield('title')
    @include('genral.includes.head_css')
  </head>
  <body class="wysihtml5-supported skin-blue">
      @include('genral.includes.header')
      @include('genral.includes.sidebar')

      @yield('content')
      
      @include('genral.includes.footer')
    
      @include('genral.includes.footer_script')

      @yield('customjs')

  </body>
</html>