<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') StoryCMS</title>
	<link href="/css/ghost-admin.css" rel="stylesheet">
</head>
<body class="ghost-login">
	<div class="liquid-target-container"></div>
	<div class="ember-view">
		<div class="gh-app">
			<aside class="gh-alerts"></aside>
			<div class="gh-viewport">
				<main class="ember-view gh-main">

          <!-- Partials Layout -->
          @include('layouts.partials.message')
          @include('layouts.partials.errors')
          <!-- End partials Layout -->

          <!-- Content Layout -->
					@section('content')
					@show
          <!-- End content Layout -->

				</main>
				<aside class="ember-view gh-notifications"></aside>
				<div class="ember-view content-cover"></div>
			</div>
		</div>
	</div>
</body>
</html>
