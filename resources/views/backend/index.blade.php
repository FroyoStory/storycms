<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{ App::getLocale() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Froyo Blog</title>
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
