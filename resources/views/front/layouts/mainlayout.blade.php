<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     @yield('title')
    @include('front.includes.head_css')
  </head>
  <body id="page-top">
      @include('front.includes.navigation')

      @yield('content')
      
      @include('front.includes.footer')
    
      @include('front.includes.footer_script')

      @yield('customjs')

  </body>
</html>