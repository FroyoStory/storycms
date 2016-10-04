<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{ App::getLocale() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Froyo Blog</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/admin-lte.css">
    <link rel="stylesheet" href="/css/custom.css">
  </head>
  <body class="skin-blue sidebar-mini">
    <app></app>
    <script>
      var CONFIG = {};
      CONFIG.USER = {!! Auth::user() !!}
    </script>
    <script src="/js/build.js"></script>
  </body>
</html>
