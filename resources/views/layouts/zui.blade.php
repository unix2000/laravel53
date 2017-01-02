<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>laravel5.3</title>
	<link href="/static/zui/css/zui.min.css" rel="stylesheet">
	<link href="/static/zui/css/zui-theme.css" rel="stylesheet">
	@yield('style')
</head>
<body>
	@include('public.nav')
	<div id="app"></div>
	<div class="container">
		@yield('content')
	</div>
	<!-- Scripts -->
	<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="/static/zui/js/zui.min.js"></script>
	<script src="//cdn.bootcss.com/vue/1.0.28/vue.min.js"></script>
	@yield('script')
</body>
</html>