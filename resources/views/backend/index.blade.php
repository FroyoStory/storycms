<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{ App::getLocale() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Froyo Blog</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  </head>
  <body>
    <app></app>
    <script>
      var CONFIG = {};
      CONFIG.USER = {!! Auth::user() !!}
    </script>
    <script src="/js/build.js"></script>
  </body>
</html>
