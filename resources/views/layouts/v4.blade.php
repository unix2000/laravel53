<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>a web based erp system</title>
	<link rel="stylesheet" type="text/css" href="/static/v4/css/bootstrap.min.css">
	{!! Html::style('css/style.css') !!}
    @yield('css')
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Logo</a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	<ul class="navbar-nav mr-auto">
	  <li class="nav-item active">
		<a class="nav-link" href="#">首页 <span class="sr-only">(current)</span></a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="#">其他连接</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link disabled" href="#">菜单分类1</a>
	  </li>
	  <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">菜单分类2</a>
		<div class="dropdown-menu" aria-labelledby="dropdown01">
		  <a class="dropdown-item" href="#">菜单分类2-1</a>
		  <a class="dropdown-item" href="#">菜单分类2-2</a>
		  <a class="dropdown-item" href="#">菜单分类2-3</a>
		</div>
	  </li>
	</ul>
	<form class="form-inline my-2 my-lg-0">
	  <input class="form-control mr-sm-2" type="text" placeholder="请输入...">
	  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">搜索</button>
	</form>
  </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="footer">
	<div class="container">
		<span class="text-muted">xxx footer...</span>
	</div>
</footer>

<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
<!--<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.slim.min.js"></script>-->
<script src="//cdn.bootcss.com/tether/1.4.0/js/tether.min.js"></script>
{!! Html::script('static/v4/js/bootstrap.min.js') !!}
@yield('script')
<script type="text/javascript">
	
</script>
</body>
</html>