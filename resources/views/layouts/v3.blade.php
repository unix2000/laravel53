<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>a web based erp system</title>
	<link id="theme_css" rel="stylesheet" type="text/css" href="/static/v3/cosmo/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/static/font-awesome/css/font-awesome.min.css">
	{!! Html::style('css/style.css') !!}
    @yield('css')
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">Logo <i class="fa fa-wifi" aria-hidden="true"></i></a>
		</div>

		<div class="navbar-collapse collapse navbar-responsive-collapse">
			<ul class="nav navbar-nav">			
				<li><a href="#">菜单11</a></li>
				<li><a href="#">菜单22</a></li>
				<li><a href="#">菜单33</a></li>		
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">主题<b class="caret"></b></a>
					<ul class="dropdown-menu" id="theme_select"  data-liburl="/static/v3/">
						<li id="theme_cosmo"><a href="javascript:void(0);">cosmo主题</a></li>
						<li id="theme_flatly"><a href="javascript:void(0);">flatly主题</a></li>
						<li id="theme_yeti"><a href="javascript:void(0);">yeti主题</a></li>
						<li id="theme_united"><a href="javascript:void(0);">united主题</a></li>
						<li class="divider"></li>
						<li id="theme_default"><a href="javascript:void(0);">默认</a></li>
					</ul>
				</li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">控制面板<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">其他设置</a></li>
						<li><a href="#">主题</a></li>
						<li><a href="#">个人设置</a></li>
						<li class="divider"></li>
						<li><a href="#">更改密码</a></li>
						<li class="divider"></li>
						<li><a href="#">注销</a></li>
					</ul>
				</li>
			</ul>

		</div>
	</div>
</div>
<!-- /navbar -->

<div class="container">
    @yield('content')
</div>

{!! Html::script('static/jquery.min.js') !!}
{!! Html::script('static/v3/js/bootstrap.min.js') !!}
@yield('script')
<script type="text/javascript">
	$("li[id^='theme_']").click(function() {
		var theme = $(this).attr("id").substr(6),
			theme_url = "";
		if(theme == "default") {
			theme_url = $("#theme_select").data("liburl") + "css/bootstrap.min.css";
		} else {
			theme_url = $("#theme_select").data("liburl") + theme +"/bootstrap.min.css";
		}
		$("#theme_css").prop("href", theme_url);
	});
</script>
</body>
</html>