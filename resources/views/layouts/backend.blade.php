<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="{{ App::getLocale() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Froyo Blog</title>
    <link href="/css/ghost-admin.css" rel="stylesheet">
  </head>
  <body>
    <div class="ember-view liquid-target-container"></div>
    <div class="ember-view">
      <div class="ember-view gh-app">
        <aside class="ember-view gh-alerts"></aside>
        <div class="gh-viewport">
          <nav-sidebar></nav-sidebar>
          @section('content')
          @show
        </div>
      </div>
    </div>
    <script src="/js/app.js"></script>
  </body>
</html>
