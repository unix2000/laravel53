<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>laravel5.3</title>
	<link href="/css/metro.css" rel="stylesheet">
  <link href="/css/metro-icons.css" rel="stylesheet">
  <link href="/css/metro-responsive.css" rel="stylesheet">
  <link href="/css/metro-schemes.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
	<link href="/css/iconfont/iconfont.css" rel="stylesheet">
	@yield('style')
</head>
<body>
	@include('public.top')
	<div class="container">
		@yield('content')
	</div>
	<!-- Scripts -->
	<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="/js/metro.min.js"></script>
</body>
</html>