<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>a web based erp system</title>
    {!! Html::style('static/uikit/css/uikit.almost-flat.min.css') !!}
	{!! Html::style('css/style.css') !!}
    @yield('css')
</head>
<body>
<nav class="cus-navbar uk-navbar uk-navbar-attached">
	<div class="uk-container uk-container-center">
		<ul class="uk-navbar-nav uk-hidden-small">
			<li><a href="#">首页</a></li>
			<li><a href="#">企业产品</a></li>
			<li><a href="#">企业服务</a></li>
			<li><a href="#">客户电话</a></li>
			<li><a href="#">关于我们</a></li>
			<li><a href="#">联系我们</a></li>
			<li class="uk-parent" data-uk-dropdown>
				<a href="">其他业务</a>
				<div class="uk-dropdown uk-dropdown-navbar">
					<ul class="uk-nav uk-nav-navbar">
						<li><a href="#">业务1</a></li>
						<li><a href="#">业务2</a></li>
						<li><a href="#">业务3</a></li>
					</ul>
				</div>
			</li>
		</ul>
		<a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
		<div class="uk-navbar-brand uk-navbar-center uk-visible-small"></div>
		<div class="uk-navbar-flip">
			<ul class="uk-navbar-nav">
				<li class="uk-parent" data-uk-dropdown>
					<a href="">xxx<i class="uk-icon-caret-down"></i></a>
					<div class="uk-dropdown uk-dropdown-navbar">
						<ul class="uk-nav uk-nav-navbar">
							<li><a href="#">控制面板</a></li>
							<li><a href="#">个人设置</a></li>
							<li><a href="#">退出</a></li>
						</ul>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div id="tm-offcanvas" class="uk-offcanvas">
	<div class="uk-offcanvas-bar">
		<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{ multiple: true }">
			<li class="uk-parent"><a href="#">菜单侧栏</a>
				<ul class="uk-nav-sub">
					<li><a href="#">菜单-</a></li>
					<li><a href="#">菜单--</a></li>
					<li><a href="#">菜单---</a></li>
					<li><a href="#">菜单----</a></li>
				</ul>
			</li>
			<li class="uk-nav-header">===菜单===</li>
			<li class="uk-parent"><a href="#"><i class="uk-icon-wrench"></i> 默认</a>
				<ul class="uk-nav-sub">
					<li><a href="#">菜单=</a></li>
					<li><a href="#">菜单==</a></li>
				</ul>
			</li>
			<li><a href="#">菜单===</a></li>
			<li><a href="#">菜单====</a></li>
		</ul>
	</div>
</div>

<div class="uk-container uk-container-center">
    @yield('content')
</div>

<div class="footer" data-uk-grid-margin>
    <div class="uk-container uk-container-center">
        <h5 class="uk-text-center">
            <a href="#">首页</a>
            | <a target="_blank" href="#">xxxx</a>
			| <a target="_blank" href="#">xxxx</a>
            | <a href="#" target="_blank">xxx</a>
            | <a href="#" target="_blank">xxxx</a>
            | <a href="#" target="_blank">xxxx</a>
            | <a href="#" target="_blank">xxxx</a>         
			<p class="uk-margin-small"/>
				xxx版权所有    
			</p>
            <p class="uk-hidden-small">
                备案
            </p>
        </h5>
    </div>
</div>

{!! Html::script('static/jquery.min.js') !!}
{!! Html::script('static/uikit/js/uikit.min.js') !!}
@yield('script')
</body>
</html>