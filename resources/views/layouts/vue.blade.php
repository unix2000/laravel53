<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" value="{{ csrf_token() }}">
	<title>laravel-vue</title>
	<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="app">
	@include('public.nav')
	<div class="container">
		@yield('content')
	</div>
	<!-- Scripts -->
	<script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//cdn.bootcss.com/vue/1.0.26/vue.min.js"></script>
	<!--<script src="app.js"></script>-->
	<script type="text/javascript">
		@yield('script');
	</script>
</body>
</html>
